<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::get('/', 'BlogController@index')->name('blog');
/*
Route::get('/post_content', function() {
	return view('blogs.post_content');
});
*/

Route::get('/post_content/{slug}', 'BlogController@post_content')->name('blogs.content');
Route::get('/post_list', 'BlogController@post_list')->name('blogs.list');
Route::get('/kategori-list/{kategori}', 'BlogController@kategori_list')->name('blogs.kategori');
Route::get('/search', 'BlogController@search')->name('blogs.search');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::resource('/kategoris','KategoriController');
	Route::resource('/tags','TagController');

	Route::get('/posts/tampil_hapus', 'PostController@tampil_hapus')->name('posts.tampil_hapus');
	Route::get('/posts/restore/{id}', 'PostController@restore')->name('posts.restore');
	Route::delete('/posts/kill/{id}', 'PostController@kill')->name('posts.kill');

	Route::resource('/posts','PostController');
	Route::resource('/users','UserController');

});




