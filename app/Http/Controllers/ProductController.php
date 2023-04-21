<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
        return view('admin.productlist');
    }
    public function showCreateForm()
    {
        return view('admin.product',['genres' => Genre::all()]);
    }

    public function handle(){
        $data = request()->all();
        switch($data['action']){
            case 'create':
                return $this->create($data);
            case 'update':
                return $this->update($data);
            case 'delete':
                return $this->delete($data);
            default:
                return redirect()->route('admin.product');
        }
    }

    private function create($data){
        $validate = request()->validate([
            'title' => ['required', 'max:255'],
            'isbn' => ['required', 'max:13','min:10','regex:/^[0-9]+$/'],
            'description' => ['required', 'max:2048'],
            'price' => ['required', 'numeric'],
            'type' => ['required'],
            'genre' => ['required'],
            'language' => ['required'],
            'authors' => ['required', 'regex:/^ *\S+(?: +\S+ *)+(?:; *\S+ +\S+ *)*$/'],
            'pages' => ['required', 'numeric'],
            'cover' => 'required|mimes:jpeg,jpg,png',
            'images' => 'required',
            'images.*' => 'mimes:jpeg,jpg,png'
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

        $book->genre()->associate($data['genre']);
        $authors = explode(';',$data['authors']);
        foreach($authors as $author){
            $authorName = explode(' ',$author);
            $last = array_pop($authorName);
            $authorName = trim(implode(' ',$authorName)," \t\n\r\0\x0B");
            if(Author::where('first_name','ILIKE','%'.$authorName.'%')->where('last_name','ILIKE','%'.$last.'%')->exists())
                $author = Author::where('first_name','ILIKE','%'.$authorName.'%')->where('last_name','ILIKE','%'.$last.'%')->first();
            else
                $author = Author::create(['first_name' => $authorName, 'last_name' => $last]);
            $book->authors()->attach($author);

        }
        
        $coverName = "gen_" . $data['title'] . "_" . Str::random(8) . '.'.request()->file('cover')->extension();
        request()->file('cover')->storeAs('res/knihy/', $coverName,'uploads');

        $book->photos()->create([
            'filename' => $coverName,
            'is_cover' => true
        ]);

        foreach(request()->file('images') as $image){
            $imageName = "gen_".$data['title'] . "_" . Str::random(8) . '.'.$image->extension();
            $image->storeAs('res/knihy/', $imageName,'uploads');
            $book->photos()->create([
                'filename' => $imageName,
                'cover' => false
            ]);
        }
        $book->save();
        return redirect('/admin/list');
    }
}
