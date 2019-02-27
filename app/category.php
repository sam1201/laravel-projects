<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    // protected $fillable=['name'];
    protected  $guarded=[];
    public function product(){
        return $this->hasMany('App\Product');
    }
}
