<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['name'];

    public function products(){

        return $this->belongsToMany('App\product');
    }
}
