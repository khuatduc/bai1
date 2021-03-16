<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSP;
use App\TheLoai;

class LoaiSPController extends Controller
{
    public function getDanhSach(){
    	 $loaisp=LoaiSP::all();
    	return view('admin.loaisp.danhsach',['loaisp'=>$loaisp]);
    }

     public function getThem(){
    	 $theloai=TheLoai::all();
    	return view('admin.loaisp.them',['theloai'=>$theloai]);
    }

    public function postThem(Request $request){
         $this->validate($request,
         	[
         		'Ten'=>"required|min:3|max:100|unique:LoaiSP,Ten",
         		'idTheLoai'=>'required'
            ],
            [
            'Ten.required'=>"ban chua nhap ten the loai",
            'Ten.min'=>"Ten the loai min la 3 ky tu",
            'Ten.max'=>"Ten the loai max la 100 ky tu",
            'Ten.uique'=>'Ten the loai da ton tai',
            'idTheLoai.required'=>'ban chua nhap idTheLoai'
            ]);
          $loaisp=new LoaiSP;
          $loaisp->Ten=$request->Ten;
          $loaisp->TenKhongDau=changeTitle($request->Ten);
          $loaisp->idTheLoai=$request->idTheLoai;
          $loaisp->save();
    	  return redirect('admin/loaisp/them')->with('thongbao','them thanh cong');
    }

    public function getSua($id){
        $theloai= TheLoai::all();
        $loaisp= LoaiSP::find($id);
    	return view('admin.loaisp.sua',['theloai'=>$theloai,'loaisp'=>$loaisp]);
    }

    public function postSua(Request $request,$id){
         $this->validate($request,
          [
            'Ten'=>"required|min:3|max:100|unique:loaisp,Ten",
            'idTheLoai'=>'required'
            ],
            [
            'Ten.required'=>"ban chua nhap ten the loai",
            'Ten.min'=>"Ten the loai min la 3 ky tu",
            'Ten.max'=>"Ten the loai max la 100 ky tu",
            'Ten.uique'=>'Ten the loai da ton tai',
            'idTheLoai.required'=>'ban chua nhap idTheLoai'
            ]);
          $loaisp=LoaiSP::find($id);
          $loaisp->Ten=$request->Ten;
          $loaisp->TenKhongDau=changeTitle($request->Ten);
          $loaisp->idTheLoai=$request->idTheLoai;
          $loaisp->save();
        return redirect('admin/loaisp/sua/'.$id)->with('thongbao','sua thanh cong');
    }

       public function getXoa($id){
    	 $theloai=LoaiSP::find($id);
    	 $theloai->delete();
    	return redirect('admin/loaisp/danhsach')->with('thongbao','xoa thanh cong');
    }

}
