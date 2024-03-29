<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $books = Book::query();

        $q = request("q");
        if ($q) {
            $splitedQuery = array_filter(explode(' ', $q));
            foreach($splitedQuery as $search) {
                $books = $books->where(function ($query) use ($search) {
                    $query->whereHas('authors', function ($query) use ($search) {
                        $query->whereRaw('LOWER(authors.first_name) LIKE ?', ['%' . strtolower($search) . '%'])
                            ->orWhereRaw('LOWER(authors.last_name) LIKE ?', ['%' . strtolower($search) . '%']);
                    })
                        ->orWhereRaw('LOWER(books.title) LIKE ?', ['%' . strtolower($search) . '%'])
                        ->orWhereRaw('LOWER(books.isbn) LIKE ?', ['%' . strtolower($search) . '%'])
                        ->orWhereRaw('LOWER(books.description) LIKE ?', ['%' . strtolower($search) . '%']);
                });
            };
            $books = $books->distinct();
        }

        $books = $books->paginate(6);

        $books_transform = [];
        foreach($books as $book){
            $author_str = '';
            foreach ($book->authors as $author) {
                $author_str = $author_str . $author->first_name . ' ' . $author->last_name . ', ';
            }
            $author_str=rtrim($author_str,', ');
            $image = config('constants.IMAGE_DIR') . $book->photos->where('is_cover', true)->first()->filename;

            array_push($books_transform, (object)[
                "book" => $book,
                "authors" => $author_str,
                "image" => $image,
            ]);
        }

        return view('admin.productlist', ['booksQ' => $books, 'books' => $books_transform, 'q' => $q]);
    }
    public function showCreateForm()
    {
        return view('admin.editproduct',['genres' => Genre::all(), 'authorsAll' => Author::all()->sortBy('last_name')]);
    }

    public function showEditForm($id)
    {
        $book = Book::findorFail($id);
        $authors = '';
        foreach ($book->authors as $author) {
            $authors = $authors . $author->first_name . ' ' . $author->last_name . '; ';
        }

        $filenames = [];
        $photosF = $book->photos->where('is_cover',false);
        foreach ($photosF as $photo) {
            $filenames[] = $photo->filename;
        }
        $cover = $book->photos->where('is_cover', true)->first()->filename;

        return view('admin.editproduct',['book' => $book, 'authors' => $authors, "filenames" => $filenames, 'cover' => $cover, 'genres' => Genre::all(), 'authorsAll' => Author::all()->sortBy('last_name')]);
    }

    public function handle(Request $request){
        $data = request()->all();
        $action = explode(',',$request->input('action'));
        switch($action[0]){
            case 'create':
                return $this->create($data);
            case 'update':
                    return $this->update($data, $action[1]);
            case 'delete':
                return $this->delete($action[1]);
            default:
                return redirect()->route('admin.productlist');
        }
    }

    private function create($data){
        $validate = request()->validate([
            'title' => ['required', 'max:255'],
            'isbn' => ['required', 'max:13','min:10','regex:/^(?:[0-9]{10}|[0-9]{13})$/'],
            'description' => ['required', 'max:2048'],
            'price' => ['required', 'numeric'],
            'type' => ['required'],
            'genre' => ['required'],
            'language' => ['required'],
            'authors' => ['required', 
                    'regex:/^;* *[^\s;]{1,255}(?: +[^\s;]{1,255} *)+(?:;(?: *[^\s;]{1,255}(?: +[^\s;]{1,255} *)+)*)* *$/',
                    function ($attribute, $value, $fail) {
                        $authors = array_filter(explode(';', $value));
                        foreach($authors as $author) {
                            $authorNames = array_filter(explode(' ',$author));
                            $lastName = array_pop($authorNames);
                            $firstName = trim(implode(' ',$authorNames)," \t\n\r\0\x0B");
                            if (strlen($firstName) > 255 || strlen($lastName) > 255) {
                                $fail('Priliš dlhé meno alebo priezvisko autora');
                            }
                        }
                    }],
            'pages' => ['required', 'numeric'],
            'cover' => 'required|mimes:jpeg,jpg,png,JPG,PNG,JPEG',
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,JPG,PNG,JPEG'
        ],[
            'authors.regex' => 'Zadajte autora vo formáte: Meno Priezvisko; Meno Priezvisko; ...',
            'images.required' => 'Vyberte aspoň jednu fotku',
            'images.*.mimes' => 'Fotky musia byť vo formáte: jpeg, jpg, png, JPG, PNG, JPEG',
            'cover.mimes' => 'Obal musí byť vo formáte: jpeg, jpg, png, JPG, PNG, JPEG',
            'isbn.regex' => 'ISBN musí obsahovať len 10 alebo 13 čísel',
            'isbn.min' => 'ISBN musí obsahovať 10 alebo 13 čísel',
            'isbn.max' => 'ISBN môže obsahovať 10 alebo 13 čisel',
            'description.max' => 'Popis môže obsahovať najviac 2048 znakov',
            'title.max' => 'Názov môže obsahovať najviac 255 znakov',

        ]);

        $book = Book::create([
            'title' => $data['title'],
            'isbn' => $data['isbn'],
            'description' => $data['description'],
            'price' => $data['price'],
            'type' => $data['type'],
            'language' => $data['language'],
            'page_count' => $data['pages'],
        ]);


        $bookName = substr(implode('_',explode(' ',$data['title'])),0,50);

        $book->genre()->associate($data['genre']);
        $authors = array_filter(explode(';',$data['authors']));
        foreach($authors as $author){
            $authorName = array_filter(explode(' ',$author));
            $last = array_pop($authorName);
            $authorName = trim(implode(' ',$authorName)," \t\n\r\0\x0B");
            if(Author::where('first_name','ILIKE',$authorName)->where('last_name','ILIKE',$last)->exists())
                $author = Author::where('first_name','ILIKE',$authorName)->where('last_name','ILIKE',$last)->first();
            else
                $author = Author::create(['first_name' => $authorName, 'last_name' => $last]);
            $book->authors()->sync([$author->id],false);
        }
        $coverName = "gen_" . $bookName . "_" . Str::random(15) . '.'.request()->file('cover')->extension();
        request()->file('cover')->storeAs('res/knihy/', $coverName,'uploads');

        $book->photos()->create([
            'filename' => $coverName,
            'is_cover' => true
        ]);


        foreach(request()->file('images') as $image){
            $imageName = "gen_".$bookName . "_" . Str::random(15) . '.'.$image->extension();
            $image->storeAs('res/knihy/', $imageName,'uploads');
            $book->photos()->create([
                'filename' => $imageName,
                'cover' => false
            ]);
        }
        $book->save();
        return redirect('/admin/list');
    }

    private function update($data, $id){
        $validate = request()->validate([
            'title' => ['required', 'max:255'],
            'isbn' => ['required', 'max:13','min:10','regex:/^(?:[0-9]{10}|[0-9]{13})$/'],
            'description' => ['required', 'max:2048'],
            'price' => ['required', 'numeric'],
            'type' => ['required'],
            'genre' => ['required'],
            'language' => ['required'],
            'authors' => ['required', 
            'regex:/^;* *[^\s;]{1,255}(?: +[^\s;]{1,255} *)+(?:;(?: *[^\s;]{1,255}(?: +[^\s;]{1,255} *)+)*)* *$/',
            function ($attribute, $value, $fail) {
                $authors = array_filter(explode(';', $value));
                foreach($authors as $author) {
                    $authorNames = array_filter(explode(' ',$author));
                    $lastName = array_pop($authorNames);
                    $firstName = trim(implode(' ',$authorNames)," \t\n\r\0\x0B");
                    if (strlen($firstName) > 255 || strlen($lastName) > 255) {
                        $fail('Priliš dlhé meno alebo priezvisko autora');
                    }
                }
            }],
            'pages' => ['required', 'numeric'],
            'cover' => 'mimes:jpeg,jpg,png',
            'images.*' => 'mimes:jpeg,jpg,png'
        ],[
            'authors.regex' => 'Zadajte autora vo formáte: Meno Priezvisko; Meno Priezvisko; ...',
            'images.required' => 'Vyberte aspoň jednu fotku',
            'images.*.mimes' => 'Fotky musia byť vo formáte: jpeg, jpg, png, JPG, PNG, JPEG',
            'cover.mimes' => 'Obal musí byť vo formáte: jpeg, jpg, png, JPG, PNG, JPEG',
            'isbn.regex' => 'ISBN musí obsahovať len 10 alebo 13 čísel',
            'isbn.min' => 'ISBN musí obsahovať 10 alebo 13 čísel',
            'isbn.max' => 'ISBN môže obsahovať 10 alebo 13 čisel',
            'description.max' => 'Popis môže obsahovať najviac 2048 znakov',
            'title.max' => 'Názov môže obsahovať najviac 255 znakov',
        ]);

        $book = Book::findorFail($id);
        $book->update([
            'title' => $data['title'],
            'isbn' => $data['isbn'],
            'description' => $data['description'],
            'price' => $data['price'],
            'type' => $data['type'],
            'language' => $data['language'],
            'page_count' => $data['pages'],
        ]);

        $book->genre()->associate($data['genre']);

        $authors = array_filter(explode(';',$data['authors']));
        $oldAuthors = $book->authors()->get();
        $book->authors()->detach();
        foreach($authors as $author){
            $authorName = array_filter(explode(' ',$author));
            $last = array_pop($authorName);
            $authorName = trim(implode(' ',$authorName)," \t\n\r\0\x0B");

            if(Author::where('first_name','ILIKE',$authorName)->where('last_name','ILIKE',$last)->exists())
                $author = Author::where('first_name','ILIKE',$authorName)->where('last_name','ILIKE',$last)->first();
            else
                $author = Author::create(['first_name' => $authorName, 'last_name' => $last]);
            $book->authors()->sync([$author->id],false);
        }
        foreach($oldAuthors as $author){
            if($author->books()->count() == 0)
                $author->delete();
        }

        $bookName = substr(implode('_',explode(' ',$data['title'])),0,50);


        if(request()->file('cover') != null){
            $cover= $book->photos()->where('is_cover',true)->first();
            Storage::disk('uploads')->delete('res/knihy/'.$cover->filename);
            $cover->delete();
            $coverName = "gen_" . $bookName . "_" . Str::random(15) . '.'.request()->file('cover')->extension();
            request()->file('cover')->storeAs('res/knihy/', $coverName,'uploads');

            $book->photos()->create([
                'filename' => $coverName,
                'is_cover' => true
            ]);
        }

        if(request()->file('images') != null){
            foreach(request()->file('images') as $image){
                $imageName = "gen_".$bookName. "_" . Str::random(15) . '.'.$image->extension();
                    $image->storeAs('res/knihy/', $imageName,'uploads');
                    $book->photos()->create([
                        'filename' => $imageName,
                        'cover' => false
                    ]);
            }
        }
        if(!empty($data['deleteImgs'])){
            foreach($data['deleteImgs'] as $image){
                $book->photos()->where('filename',$image)->delete();
                Storage::disk('uploads')->delete('res/knihy/'.$image);
            }
        }
        $book->updated_at = Carbon::now("Europe/Budapest")->toDateTimeString();
        $book->save();
        return redirect('/admin/list');
    }

    private function delete($id){
        $book = Book::findorFail($id);
        $authors = $book->authors;
        $book->authors()->detach();
        foreach($authors as $author){
            if($author->books()->count() == 0)
                $author->delete();
        }
        foreach($book->photos as $photo){
            Storage::disk('uploads')->delete('res/knihy/'.$photo->filename);
        }
        $book->photos()->delete();

        $book->delete();
        return redirect('/admin/list');
    }
}
