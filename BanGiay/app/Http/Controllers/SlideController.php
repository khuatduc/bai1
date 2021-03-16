<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getDanhSach(){
       $slide=Slide::all();
       return view("admin.slide.danhsach",['slide'=>$slide]);
    }

     public function getThem(){
      return  view("admin.slide.them");
    }

     public function postThem(Request $request){
      $this->validate($request,
      	    ['Ten'=>"required",
      	      'NoiDung'=>"required"
            ],
            [
            'Ten.required'=>"ban chua nhap ten slide",
            'NoiDung.required'=>"ban chua nhap noi dung",
            ]);
        $slide=new Slide;
        $slide->Ten=$request->Ten;
        $slide->NoiDung=$request->NoiDung;
        if ($request->has('Link')) {
        	$slide->link=$request->Link;
        }

        if ($request->hasFile('Hinh')) {
        	$file=$request->file('Hinh');
        	$duoi=$file->getClientOriginalExtension('Hinh');
        	if ($duoi!='jpg'&&$duoi!='png'&&$duoi!='jpeg') {
        		return redirect('admin/slide/them')->with('loi','file anh ko hop le');
        	}else{
        	$hinh=$file->getClientOriginalName();
        	$hinh=random_int(0, 9999)."_".random_int(0, 9999).$hinh;
        	while (file_exists('upload/slide/'.$hinh)) {
        		$hinh=random_int(0, 9999)."_".random_int(0, 9999).$hinh;
        	}

        	  $file->move('upload/slide',$hinh);
              $slide->Hinh=$hinh;
             }

        }else{
        	$hinh="";
        }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','them thanh cong');
    }

     public function getSua($id){
         $slide=Slide::find($id);
         return view('admin.slide.sua',["slide"=>$slide]);
    }

     public function postSua(Request $request,$id){
     	   $slide=Slide::find($id);
          $this->validate($request,
      	    ['Ten'=>"required",
      	      'NoiDung'=>"required"
            ],
            [
            'Ten.required'=>"ban chua nhap ten slide",
            'NoiDung.required'=>"ban chua nhap noi dung",
            ]);
     
        $slide->Ten=$request->Ten;
        $slide->NoiDung=$request->NoiDung;
        if ($request->has('Link')) {
        	$slide->link=$request->Link;
        }

        if ($request->hasFile('Hinh')) {
        	$file=$request->file('Hinh');
        	$duoi=$file->getClientOriginalExtension('Hinh');
        	if ($duoi!='jpg'&&$duoi!='png'&&$duoi!='jpeg') {
        		return redirect('admin/slide/them')->with('loi','file anh ko hop le');
        	}else{
        	$hinh=$file->getClientOriginalName();
        	$hinh=random_int(0, 9999)."_".random_int(0, 9999).$hinh;
        	while (file_exists('upload/slide/'.$hinh)) {
        		$hinh=random_int(0, 9999)."_".random_int(0, 9999).$hinh;
        	}

        	  $file->move('upload/slide',$hinh);
        	  unlink('upload/slide/'.$slide->Hinh);
              $slide->Hinh=$hinh;
             }

        }
        $slide->save();
        return redirect('admin/slide/sua/'.$id)->with('thongbao','sua thanh cong');
    }


    public function getXoa($id){
         $slide=Slide::find($id);
         $slide->delete();
        unlink('upload/slide/'.$slide->Hinh);
         return redirect('admin/slide/danhsach')->with("thongbao","xoa thanh cong");
    }
}
