<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\category;
use App\User;
use App\tag;

class product extends Model
{
    // protected $fillable=['name','category_id','user_id'];
    protected  $guarded=[];
   
    public function user(){
        return  $this->belongsTo('App\User');
    }

   public function category(){
       return $this->belongsTo('App\category');
   }

   public function tags(){
       return $this->belongsToMany('App\tag');
   }
}
