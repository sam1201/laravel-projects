<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class role extends Model
{
    protected $fillable=['id','name'];
    

    public function user(){
        return $this->hasOne('App\User');
    }
}
