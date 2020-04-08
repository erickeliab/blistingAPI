<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //seting relationship

    public function user(){

        return $this->belongsTo('App\User');
    }
}
