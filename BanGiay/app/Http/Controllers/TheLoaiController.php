<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getDanhSach(){
       $theloai=TheLoai::all();
       return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getThem(){
       return view('admin.theloai.them');
    }

    public function postThem(Request $request){
       $this->validate($request,
       	[
       		'Ten'=>'required|min:3|max:100|unique:TheLoai,Ten'
       	],
       	[
            'Ten.required'=>"ban chua nhap ten the loai",
            'Ten.min'=>"Ten the loai min la 3 ky tu",
            'Ten.max'=>"Ten the loai max la 100 ky tu",
            'Ten.unique'=>'Ten the loai da ton tai'
       	]);
       $theloai=new TheLoai;
       $theloai->Ten=$request->Ten;
       $theloai->TenKhongDau=changeTitle($request->Ten);
       $theloai->save();
       return redirect('admin/theloai/them')->with('thongbao','them thanh cong');
    }

    public function getXoa($id){
        $theloai=TheLoai::find($id);
        $theloai->delete();
        return redirect('admin/theloai/danhsach');
    }

     public function getSua($id){
        $theloai=TheLoai::find($id);
        return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

     public function postSua(Request $request,$id){
        $theloai=TheLoai::find($id);
        $this->validate($request,
        	[
        		'Ten'=>'required|min:3|max:100|unique:TheLoai,Ten'
        	],
            [
            	'Ten.required'=>"ban chua nhap ten the loai",
                'Ten.min'=>"Ten the loai min la 3 ky tu",
                'Ten.max'=>"Ten the loai max la 100 ky tu",
                'Ten.uique'=>'Ten the loai da ton tai'
            ]);
       $theloai->Ten=$request->Ten;
       $theloai->TenKhongDau=changeTitle($request->Ten);
       $theloai->save();
       return redirect('admin/theloai/sua/'.$id)->with('thongbao','sua thanh cong');
    }



}
