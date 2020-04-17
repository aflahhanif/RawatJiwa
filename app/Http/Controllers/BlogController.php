<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Kategori;

class BlogController extends Controller
{
    public function index(Post $post){
    	$kategori_widget = Kategori::all();
    	$data = $post->latest()->take(8)->get();
    	return view('blog', compact('data', 'kategori_widget'));
    }

    public function post_content($slug){
    	$kategori_widget = Kategori::all();
    	$data = Post::where('slug', $slug)->get();
    	return view('blogs.post_content', compact('data', 'kategori_widget'));
    }

    public function post_list(){
    	$kategori_widget = Kategori::all();
    	$data = Post::latest()->paginate(6);
    	return view('blogs.post_list', compact('data', 'kategori_widget'));
    }

    public function kategori_list(kategori $kategori){
    	$kategori_widget = Kategori::all();

    	$data = $kategori->post()->paginate(6);
    	return view('blogs.post_list', compact('data', 'kategori_widget'));
    }

    public function search(request $request){
    	$kategori_widget = Kategori::all();

    	$data = Post::where('judul', $request->search)->orWhere('judul', 'like', '%'.$request->search.'%')->paginate(6);
    	return view('blogs.post_list', compact('data', 'kategori_widget'));
    }

}
