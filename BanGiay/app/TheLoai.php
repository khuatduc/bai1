<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table="TheLoai";
    public function loaisp(){
    	return $this->hasMany('App\LoaiSP','idTheLoai','id');
    }

    public function chitiet(){
    	return $this->hasManyThrough('App\ChiTiet','App\LoaiSP','idTheLoai','idLoaiSP','id');
    }
}
