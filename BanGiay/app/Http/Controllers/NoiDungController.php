<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoiDung;

class NoiDungController extends Controller
{
    public function getDanhSach(){
       $noidung=NoiDung::all();
       return view("admin.noidung.danhsach",['noidung'=>$noidung]);
    }

     public function getThem(){
      return  view("admin.noidung.them");
    }

     public function postThem(Request $request){
      $this->validate($request,
      	    [ 'TieuDe1'=>"required",
      	      'NoiDung1'=>"required",
              'TieuDe2'=>"required",
              'NoiDung2'=>"required",
              'TieuDe3'=>"required",
              'NoiDung3'=>"required",
            ],
            [
            'TieuDe1.required'=>"ban chua nhap tieu de 1",
            'NoiDung1.required'=>"ban chua nhap noi dung 1",
            'TieuDe2.required'=>"ban chua nhap tieu de 2",
            'NoiDung2.required'=>"ban chua nhap noi dung 2",
            'TieuDe3.required'=>"ban chua nhap tieu de 3",
            'NoiDung3.required'=>"ban chua nhap noi dung 3",
            ]);
        $noidung=new NoiDung;
        $noidung->TieuDe1=$request->TieuDe1;
        $noidung->NoiDung1=$request->NoiDung1;
         $noidung->TieuDe2=$request->TieuDe2;
        $noidung->NoiDung2=$request->NoiDung2;
         $noidung->TieuDe3=$request->TieuDe3;
        $noidung->NoiDung3=$request->NoiDung3;

        if ($request->hasFile('Hinh1')) {
        	$file1=$request->file('Hinh1');
        	$duoi1=$file1->getClientOriginalExtension('Hinh1');
        	if ($duoi1!='jpg'&&$duoi1!='png'&&$duoi1!='jpeg') {
        		return redirect('admin/noidung/them')->with('loi','file anh ko hop le');
        	}else{
        	$hinh1=$file1->getClientOriginalName();
        	$hinh1=random_int(0, 9999)."_".random_int(0, 9999).$hinh1;
        	while (file_exists('upload/noidung/'.$hinh1)) {
        		$hinh1=random_int(0, 9999)."_".random_int(0, 9999).$hinh1;
        	}

        	  $file1->move('upload/noidung',$hinh1);
              $noidung->Hinh1=$hinh1;
             }

        }else{
        	$hinh1="";
        }

         if ($request->hasFile('Hinh2')) {
          $file2=$request->file('Hinh2');
          $duoi2=$file2->getClientOriginalExtension('Hinh2');
          if ($duoi2!='jpg'&&$duoi2!='png'&&$duoi2!='jpeg') {
            return redirect('admin/noidung/them')->with('loi','file anh ko hop le');
          }else{
          $hinh2=$file2->getClientOriginalName();
          $hinh2=random_int(0, 9999)."_".random_int(0, 9999).$hinh2;
          while (file_exists('upload/noidung/'.$hinh2)) {
            $hinh2=random_int(0, 9999)."_".random_int(0, 9999).$hinh2;
          }

            $file2->move('upload/noidung',$hinh2);
              $noidung->Hinh2=$hinh2;
             }

        }else{
          $hinh2="";
        }
        $noidung->save();
        return redirect('admin/noidung/them')->with('thongbao','them thanh cong');
    }

     public function getSua($id){
         $noidung=NoiDung::find($id);
         return view('admin.noidung.sua',["noidung"=>$noidung]);
    }

     public function postSua(Request $request,$id){
     	   $noidung=NoiDung::find($id);
          var_dump($noidung);
          $this->validate($request,
      	    [ 'TieuDe1'=>"required",
              'NoiDung1'=>"required",
              'TieuDe2'=>"required",
              'NoiDung2'=>"required",
              'TieuDe3'=>"required",
              'NoiDung3'=>"required"
            ],
            [
            'TieuDe1.required'=>"ban chua nhap tieu de 1",
            'NoiDung1.required'=>"ban chua nhap noi dung 1",
            'TieuDe2.required'=>"ban chua nhap tieu de 2",
            'NoiDung2.required'=>"ban chua nhap noi dung 2",
            'TieuDe3.required'=>"ban chua nhap tieu de 3",
            'NoiDung3.required'=>"ban chua nhap noi dung 3"
            ]);
     
       $noidung->TieuDe1=$request->TieuDe1;
        $noidung->NoiDung1=$request->NoiDung1;
         $noidung->TieuDe2=$request->TieuDe2;
        $noidung->NoiDung2=$request->NoiDung2;
         $noidung->TieuDe3=$request->TieuDe3;
        $noidung->NoiDung3=$request->NoiDung3;

        if ($request->hasFile('Hinh1')) {
          $file1=$request->file('Hinh1');
          $duoi1=$file1->getClientOriginalExtension('Hinh1');
          if ($duoi1!='jpg'&&$duoi1!='png'&&$duoi1!='jpeg') {
            return redirect('admin/noidung/them')->with('loi','file anh ko hop le');
          }else{
          $hinh1=$file1->getClientOriginalName();
          $hinh1=random_int(0, 9999)."_".random_int(0, 9999).$hinh1;
          while (file_exists('upload/noidung/'.$hinh1)) {
            $hinh1=random_int(0, 9999)."_".random_int(0, 9999).$hinh1;
          }

            $file1->move('upload/noidung',$hinh1);
            unlink('upload/noidung/'.$noidung->Hinh1);
              $noidung->Hinh1=$hinh1;
             }

        }

         if ($request->hasFile('Hinh2')) {
          $file2=$request->file('Hinh2');
          $duoi2=$file2->getClientOriginalExtension('Hinh2');
          if ($duoi2!='jpg'&&$duoi2!='png'&&$duoi2!='jpeg') {
            return redirect('admin/noidung/them')->with('loi','file anh ko hop le');
          }else{
          $hinh2=$file2->getClientOriginalName();
          $hinh2=random_int(0, 9999)."_".random_int(0, 9999).$hinh2;
          while (file_exists('upload/noidung/'.$hinh2)) {
            $hinh2=random_int(0, 9999)."_".random_int(0, 9999).$hinh2;
          }

            $file2->move('upload/noidung',$hinh2);
              unlink('upload/noidung/'.$noidung->Hinh2);
              $noidung->Hinh2=$hinh2;
             }

        }

        $noidung->save();
        return redirect('admin/noidung/sua/'.$id)->with('thongbao','sua thanh cong');
    }


    public function getXoa($id){
         $noidung=NoiDung::find($id);
         $noidung->delete();
        unlink('upload/noidung/'.$noidung->Hinh1);
         unlink('upload/noidung/'.$noidung->Hinh2);
         return redirect('admin/noidung/danhsach')->with("thongbao","xoa thanh cong");
    }
}
