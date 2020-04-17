<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable =['nama', 'slug'];

    protected $table = 'kategoris';

    public function post(){
    	return $this->hasMany('App\Post');
    }

    public function getRouteKeyName(){
    	return 'slug';
    }
}
