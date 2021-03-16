<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MuaHang;

class MuaHangController extends Controller
{
    public function getDanhSach(){
       $muahang=MuaHang::all();
       return view('admin.muahang.danhsach',['muahang'=>$muahang]);
    }

   
    public function getXoa($id){
      
        
    }

    

}
