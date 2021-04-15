<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $guarded = array('id');
    
    public function permissions()
    {
      return $this->hasMany('App\Permission');
    }
}
