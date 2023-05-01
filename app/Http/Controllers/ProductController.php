<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class ProductController extends Controller
{
    public function index(){
        return view('admin.productlist');
    }
    public function showCreateForm()
    {
        return view('admin.product',['genres' => Genre::all()]);
    }

    public function showEditForm($id)
    {
        $book = Book::findorFail($id);
        $authors = '';
        foreach ($book->authors as $author) {
            $authors = $authors . $author->first_name . ' ' . $author->last_name . ', ';
        }
        $authors = rtrim($authors,', ');

        $filenames = [];
        $photosF = $book->photos->where('is_cover',false);
        foreach ($photosF as $photo) {
            $filenames[] = $photo->filename;
        }
        $cover = $book->photos->where('is_cover', true)->first()->filename;

        return view('admin.editproduct',['book' => $book, 'authors' => $authors, "filenames" => $filenames, 'cover' => $cover, 'genres' => Genre::all()]);
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
            'isbn' => ['nullable','max:13','min:10','regex:/^[0-9]+$/'],
            'description' => ['required', 'max:2048'],
            'price' => ['nullable','numeric'],
            'type' => [],
            'genre' => [],
            'language' => [],
            'authors' => [ 'nullable','regex:/^ *\S+(?: +\S+ *)+(?:; *\S+ +\S+ *)*$/'],
            'pages' => ['nullable', 'numeric'],
            'cover' => 'required|mimes:jpeg,jpg,png,JPG,PNG,JPEG',
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,JPG,PNG,JPEG'
        ]);



        $book = Book::create([
            'title' => $data['title'],
            'isbn' => $data['isbn'] ?? '0000000000000',
            'description' => $data['description'],
            'price' => $data['price'] ?? 0,
            'type' => $data['type'] ?? 'pevna',
            'language' => $data['language'] ?? 'slovensky',
            'page_count' => $data['pages'] ?? 0,
        ]);

        $book->genre()->associate($data['genre'] ?? '1');
        $authors = explode(';',$data['authors'] ?? '');
        foreach($authors as $author){
            if(empty($author)) continue;
            $authorName = explode(' ',$author);
            $last = array_pop($authorName);
            $authorName = trim(implode(' ',$authorName)," \t\n\r\0\x0B");
            if(Author::where('first_name','ILIKE',$authorName)->where('last_name','ILIKE',$last)->exists())
                $author = Author::where('first_name','ILIKE',$authorName)->where('last_name','ILIKE',$last)->first();
            else
                $author = Author::create(['first_name' => $authorName, 'last_name' => $last]);
            $book->authors()->attach($author);

        }

        $coverName = "gen_" . $data['title'] . "_" . Str::random(15) . '.'.request()->file('cover')->extension();
        request()->file('cover')->storeAs('res/knihy/', $coverName,'uploads');

        $book->photos()->create([
            'filename' => $coverName,
            'is_cover' => true
        ]);

        foreach(request()->file('images') as $image){
            $imageName = "gen_".$data['title'] . "_" . Str::random(15) . '.'.$image->extension();
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
            'isbn' => ['nullable', 'max:13','min:10','regex:/^[0-9]+$/'],
            'description' => ['required', 'max:2048'],
            'price' => ['nullable', 'numeric'],
            'type' => [],
            'genre' => [],
            'language' => [],
            'authors' => ['nullable', 'regex:/^ *\S+(?: +\S+ *)+(?:; *\S+ +\S+ *)*$/'],
            'pages' => ['nullable', 'numeric'],
            'cover' => 'mimes:jpeg,jpg,png',
            'images.*' => 'mimes:jpeg,jpg,png'
        ]);

        $book = Book::findorFail($id);
        $book->update([
            'title' => $data['title'],
            'isbn' => $data['isbn'] ?? $book->isbn,
            'description' => $data['description'],
            'price' => $data['price'] ?? $book->price,
            'type' => $data['type'] ?? $book->type,
            'language' => $data['language'] ?? $book->language,
            'page_count' => $data['pages'] ?? $book->page_count,
        ]);

        $book->genre()->associate($data['genre']);

        $authors = explode(';',$data['authors']);
        $book->authors()->detach();
        foreach($authors as $author){
            if(empty($author)) continue;
            $authorName = explode(' ',$author);
            $last = array_pop($authorName);
            $authorName = trim(implode(' ',$authorName)," \t\n\r\0\x0B");
            if(Author::where('first_name','ILIKE',$authorName)->where('last_name','ILIKE',$last)->exists())
                $author = Author::where('first_name','ILIKE',$authorName)->where('last_name','ILIKE',$last)->first();
            else
                $author = Author::create(['first_name' => $authorName, 'last_name' => $last]);
            $book->authors()->attach($author);
        }

        if(request()->file('cover') != null){
            $book->photos()->first()->delete();

            $coverName = "gen_" . $data['title'] . "_" . Str::random(15) . '.'.request()->file('cover')->extension();
            request()->file('cover')->storeAs('res/knihy/', $coverName,'uploads');

            $book->photos()->create([
                'filename' => $coverName,
                'is_cover' => true
            ]);
        }

        if(request()->file('images') != null){
            foreach(request()->file('images') as $image){
                $imageName = "gen_".$data['title'] . "_" . Str::random(15) . '.'.$image->extension();
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

        $book->save();
        return redirect('/admin/list');
    }

    private function delete($id){
        $book = Book::findorFail($id);
        $book->authors()->detach();
        $book->photos()->delete();
        $book->delete();
        return redirect('/admin/list');
    }
}
