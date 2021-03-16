<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    protected  $table="LoaiSP";

    public function theloai(){
    	return $this->belongsTo('App\TheLoai','idTheLoai','id');
    }

    public function chitiet(){
    	return $this->hasMany('App\ChiTiet','idLoaiSP','id');
    }
}
