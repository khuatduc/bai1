<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="Comment";

    public function chitiet(){
    	return $this->belongsTo('App\ChiTiet','idChiTiet','id');
    }

    public function user(){
    	return $this->belongsTo('App\User','idUser','id');
    }
}
