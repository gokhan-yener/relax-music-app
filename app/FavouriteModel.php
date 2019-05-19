<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavouriteModel extends Model
{
    protected $table = "favourites";
    protected $guarded = [];


    public function song(){
        return $this->belongsTo('\App\SongModel');
    }


}
