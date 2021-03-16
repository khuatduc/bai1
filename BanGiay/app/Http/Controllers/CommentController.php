<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\ChiTiet;
use Auth;

class CommentController extends Controller
{
    public function getXoa($id,$idchitiet){
         $comment=Comment::find($id);
         $comment->delete();
         return redirect('admin/chitiet/sua/'.$idchitiet)->with('thongbao',"xoa thanh cong");
    }

    public function postComment($id,Request $request){
    	$idchitiet=$id;
    	$chitiet=ChiTiet::find($id);
    	$comment=new Comment;
    	$comment->idchitiet=$idchitiet;
    	$comment->idUser=Auth::user()->id;
    	$comment->NoiDung=$request->NoiDung;
    	$comment->save();
    	return redirect("chitiet/$id/".$chitiet->TieuDeKhongDau.".html")->with('thongbao','viet binh luan thanh cong');
    }
}
