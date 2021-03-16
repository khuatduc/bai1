<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiSP;
use App\ChiTiet;

class AjaxController extends Controller
{
    public function getAjax($id){
       $loaisp=LoaiSP::where('idTheLoai',$id)->get();
       foreach ($loaisp as $lt) {
           echo  "<option value='".$lt->id."'>".$lt->Ten."</option>";
       }
    }
}
