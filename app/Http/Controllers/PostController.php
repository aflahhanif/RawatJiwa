<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Kategori;
use App\Tag;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::paginate(10);
        return view('admin.posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tag::all();
        $kategori = Kategori::all();
        return view('admin.posts.create', compact('kategori', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'kategori_id' => 'required',
            'konten' => 'required',
            'gambar' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Post::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'konten' => $request->konten,
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'user_id' => Auth::id()
        ]);

        //tag dari nama <select> untuk tag dari create.blade.php
        $post->tags()->attach($request->tag);

        $gambar->move('public/uploads/posts/', $new_gambar);

        return redirect()->route('posts.index')->with('success', 'Post telah berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::all();
        $tag = Tag::all();
        $post = Post::findorFail($id);
        return view('admin.posts.edit', compact('post', 'tag', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'kategori_id' => 'required',
            'konten' => 'required',
            'gambar' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $post = Post::findorFail($id);

        if($request->has('gambar')){
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/uploads/posts/', $new_gambar);

            $post_data = [
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'konten' => $request->konten,
            'gambar' => 'public/uploads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul)
            ];
        }
        else{
            $post_data = [
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'konten' => $request->konten,
            'slug' => Str::slug($request->judul)
            ];
        }

        //tag dari nama <select> untuk tag dari create.blade.php
        //tags dari nama fungsi yang ada di model (eloquent relationship)
        $post->tags()->sync($request->tag);
        $post->update($post_data);

        return redirect()->route('posts.index')->with('success', 'Post telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post berhasil dipindah ke Trash');
    }

    public function tampil_hapus(){
        $post = Post::onlyTrashed()->paginate(10);
        return view('admin.posts.hapus', compact('post'));
    }

    public function restore($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('success', 'Post berhasil dikembalikan ke dalam daftar post');
    }

    public function kill($id){
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success', 'Post berhasil dihapus secara permanen');
    }
}
