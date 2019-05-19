<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongModel extends Model
{
    protected $table = "song";
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\CategoryModel');
    }

    public function user(){
        return $this->hasMany('App\User');
    }


}
