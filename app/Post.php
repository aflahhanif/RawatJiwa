<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	protected $fillable = ['konten', 'judul', 'gambar', 'kategori_id', 'slug', 'user_id'];

    public function kategori(){
    	return $this->belongsTo('App\Kategori');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

    public function users(){
    	return $this->belongsTo('App\User' , 'user_id', 'id');
    }
}
