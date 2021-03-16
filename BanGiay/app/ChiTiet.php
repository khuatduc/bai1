<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTiet extends Model
{
    protected $table="ChiTiet";

    public function loaisp(){
    	return $this->belongsTo('App\LoaiSP','idLoaiSP','id');
    }

    public function comment(){
    	return $this->hasMany('App\Comment','idChiTiet','id');
    }
}
