<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
   public function childs(){
      return $this->hasMany('App\Cats','p_id');
    }
}
