<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiSP;
use App\ChiTiet;
use App\Comment;

class ChiTietController extends Controller
{
    public function getDanhSach(){
       $chitiet=ChiTiet::orderBy('id','desc')->get();
       return view('admin.chitiet.danhsach',['chitiet'=>$chitiet]);
    }

   public function getThem(){
   	  $theloai=TheLoai::all();
   	  $loaisp=LoaiSP::all();
      return view('admin.chitiet.them',['theloai'=>$theloai,'loaisp'=>$loaisp]);
    }

    public function postThem(Request $request){
      $this->validate($request,
    		[
    			'theloai'=>"required",
    			'loaisp'=>"required",
    			'tieude'=>"required|min:3|unique:ChiTiet,TieuDe",
    			'tomtat'=>"required",
    			'noidung'=>"required",
          'gia'=>"required",
    		],
    		[
    			'theloai.required'=>"ban chua nhap theloai",
    			'loaisp.required'=>"ban chua nhap loaisp",
    			'tieude.required'=>"ban chua nhap tieude",
    			'tieude.min'=>"tieu de phai co it nha 3 ky tu",
    			'tieude.unique'=>"tieu de da ton tai",
    			'tomtat.required'=>"ban chua nhap tomtat",
    			'noidung.required'=>"ban chua nhap noidung",
          'gia.required'=>"ban chua nhap gia",
    		]);
   	  $chitiet=new ChiTiet;
   	  $chitiet->TieuDe=$request->tieude;
   	  $chitiet->TieuDeKhongDau=changeTitle($request->tieude);
   	  $chitiet->idloaisp=$request->loaisp;
   	  $chitiet->TomTat=$request->tomtat;
   	  $chitiet->NoiDung=$request->noidung;
   	  $chitiet->NoiBat=$request->noibat;
      $chitiet->gia=$request->gia;
   	  $chitiet->SoLuotXem=0;
   	  if ($request->hasFile('hinh')) {//ktra xem co truyen file hinh len ko
   	  	  $file=$request->file('hinh');//luu bien hinh vao bien file
   	  	  $duoi=$file->getClientOriginalExtension();
   	  	  if($duoi!="jpg"&&$duoi!="png"&&$duoi!="jpeg"){
              redirect('admin/chitiet/them')->with('loi','file anh ko dung dinh dang');
   	  	  }
              $name=$file->getClientOriginalName();//lay ten
   	  	      $hinh=random_int(5,9999999999)."_".$name;
   	  	      while (file_exists("upload/chitiet/".$hinh)) {
   	  	      $hinh=random_int(5,999999999)."_".$name;
   	  	      }
   	  	      $file->move("upload/chitiet",$hinh);//luu
   	  	      $chitiet->Hinh=$hinh;
   	  	  
   	  }else{
   	  	$chitiet->Hinh="";
   	  }
   	  $chitiet->save();
      return redirect('admin/chitiet/them')->with('thanhcong','them thanh cong');
    }

    public function getSua($id){
   	  $theloai=TheLoai::all();
   	  $loaisp=loaisp::all();
   	  $chitiet=ChiTiet::find($id);
      return view('admin.chitiet.sua',['theloai'=>$theloai,'loaisp'=>$loaisp,'chitiet'=>$chitiet]);
    }

    public function postSua(Request $request,$id){
       $chitiet= ChiTiet::find($id);
      $this->validate($request,
    		[
    			'theloai'=>"required",
    			'loaisp'=>"required",
    			'tieude'=>"required|min:3",
    			'tomtat'=>"required",
    			'noidung'=>"required",
          'gia'=>"required",
    		],
    		[
    			'theloai.required'=>"ban chua nhap theloai",
    			'loaisp.required'=>"ban chua nhap loaisp",
    			'tieude.required'=>"ban chua nhap tieude",
    			'tieude.min'=>"tieu de phai co it nha 3 ky tu",
    			'tieude.unique'=>"tieu de da ton tai",
    			'tomtat.required'=>"ban chua nhap tomtat",
    			'noidung.required'=>"ban chua nhap noidung",
          'gia.required'=>"ban chua nhap gia",
    		]);
      $chitiet->TieuDe=$request->tieude;
      $chitiet->TieuDeKhongDau=changeTitle($request->tieude);
      $chitiet->idloaisp=$request->loaisp;
      $chitiet->TomTat=$request->tomtat;
      $chitiet->NoiDung=$request->noidung;
       $chitiet->gia=$request->gia;
      $chitiet->NoiBat=$request->noibat;
     if ($request->hasFile('Hinh')) {
          $file1=$request->file('Hinh');
          $duoi1=$file1->getClientOriginalExtension('Hinh');
          if ($duoi1!='jpg'&&$duoi1!='png'&&$duoi1!='jpeg') {
            return redirect('admin/chitiet/them')->with('loi','file anh ko hop le');
          }else{
          $hinh1=$file1->getClientOriginalName();
          $hinh1=random_int(0, 9999)."_".random_int(0, 9999).$hinh1;
          while (file_exists('upload/chitiet/'.$hinh1)) {
            $hinh1=random_int(0, 9999)."_".random_int(0, 9999).$hinh1;
          }

            $file1->move('upload/chitiet',$hinh1);
              $chitiet->Hinh=$hinh1;
             }

        }
   	  $chitiet->save();
      return redirect('admin/chitiet/sua/'.$id)->with('thanhcong','sua thanh cong');
    }

    public function getXoa($id){
    	$chitiet=chitiet::find($id);
    	$chitiet->delete();
    	return redirect('admin/chitiet/danhsach')->with("xoa","Xoa thanh cong tin tuc");
    }

}
