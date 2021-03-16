<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\TheLoai;
use App\Slide;
use App\LoaiSP;
use App\ChiTiet;
use App\User;
use App\NoiDung;
use App\GioHang;
use App\MuaHang;

class PagesController extends Controller
{
	function __construct(){
		view()->share('theloai',TheLoai::all());
		view()->share('slide',Slide::all());
    
   
	}


    public function trangChu(){
      $id=1;
      $noidung=NoiDung::find($id);
      if (Auth::check()) {
       $giohang=GioHang::where("idNguoiDung",Auth::user()->id)->get();
       return view('pages.trangchu',['noidung'=>$noidung,"giohang"=>$giohang]);
      }else{
        return view('pages.trangchu',['noidung'=>$noidung]);
      }
    	
    }

     public function lienHe(){
        
    	return view('pages.lienhe');
    }

    public function getTheLoai($id){
      $thloai=TheLoai::find($id);
      $loaisp=LoaiSP::where("idTheLoai",$id)->get();
       if (Auth::check()) {
       $giohang=GioHang::where("idNguoiDung",Auth::user()->id)->get();
       return view('pages.loaisp',['loaisp'=>$loaisp,"thloai"=>$thloai,"giohang"=>$giohang]);
      }
      return view('pages.loaisp',['loaisp'=>$loaisp,"thloai"=>$thloai]);
    }

 

     public function loaiSP($id){

        $loaisp=LoaiSP::find($id);
        $chitiet=ChiTiet::where('idLoaiSP',$id)->orderBy('id','desc')->paginate(5);
        if (Auth::check()) {
       $giohang=GioHang::where("idNguoiDung",Auth::user()->id)->get();
       return view('pages.loaisp',['loaisp'=>$loaisp,"chitiet"=>$chitiet,"giohang"=>$giohang]);
      }
        return view('pages.loaisp',['loaisp'=>$loaisp,"chitiet"=>$chitiet]);
    }

     

    public function chitiet($id){
        $chitiet=ChiTiet::find($id);
        $id1=$chitiet->loaisp->id;
        $chitietnoibat=ChiTiet::where('idLoaiSP',$id1)->take(4)->get();
        $chitietlienquan=ChiTiet::where('idLoaiSP',$id)->take(4)->get();
        if (Auth::check()) {
       $giohang=GioHang::where("idNguoiDung",Auth::user()->id)->get();
       return view('pages.chitiet',['chitiet'=>$chitiet,'chitietnoibat'=>$chitietnoibat,'chitietlienquan'=>$chitietlienquan,"giohang"=>$giohang]);
   
      }
        return view('pages.chitiet',['chitiet'=>$chitiet,'chitietnoibat'=>$chitietnoibat,'chitietlienquan'=>$chitietlienquan]);
    }

    public function getDangNhap(){
      if (Auth::check()) {
       $giohang=GioHang::where("idNguoiDung",Auth::user()->id)->get();
       return view('pages.dangnhap',["giohang"=>$giohang]);
      }else{
        return view('pages.dangnhap');
      }
    }
    public function postDangnhap(Request $request){
            $this->validate($request,
            [
                'email'=>'required',
                'password'=>'required|min:3',
            ],
            [
            'email.required'=>'ban chua nha email',
            'password.required'=>'ban chua nhap ten user',
            'password.min'=>'Ten the loai min la 3 ky tu',
            ]);
          if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
              return redirect('trangchu');
          }else{
              return redirect('dangnhap')->with('thongbao','dang nhap khong thanh cong');
          }
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect('trangchu');
    }


    public function getDangKy(){
     if (Auth::check()) {
       $giohang=GioHang::where("idNguoiDung",Auth::user()->id)->get();
       return view('pages.dangky',["giohang"=>$giohang]);
      }else{
        return view('pages.dangky');
      }
    }

    public function postDangKy(Request $request){
         $this->validate($request,
        [
          'Ten'=>'required|min:3|max:40',
          'Email'=>'required|unique:users,email',
          'Password'=>'required|min:3',
          'PasswordAgain'=>'required|same:Password'
        ],
        [
          'Ten.required'=>'ban chua nhap ten user',
            'Ten.min'=>'Ten the loai min la 3 ky tu',
            'Ten.max'=>'Ten the loai max la 40 ky tu',
            'Email.required'=>'ban chua nha email',
            'email.unique'=>'email da ton tai',
            'Password.required'=>'ban chua nhap ten user',
            'Password.min'=>'Ten the loai min la 3 ky tu',
            'PasswordAgain.required'=>'ban chua nhap passwordAgaint',
            'PasswordAgain.same'=>'mat khau khong chun khop'
        ]);
      $user=new User;
      $user->name=$request->Ten;
      $user->email=$request->Email;
      $user->password=bcrypt($request->Password);
      $user->quyen=0;
      $user->save();
      return redirect('dangky')->with('thongbao','dang ky thanh cong');
    }


    public function postgioHang(Request $request){
        if (Auth::check()) {
         $giohang=new GioHang;
         $giohang->TieuDe=$request->TieuDe;
         $giohang->Hinh=$request->Hinh;
         $giohang->SoLuong=$request->SoLuong;
         $giohang->Gia=$request->Gia;
         $giohang->idNguoiDung=Auth::user()->id;
         $giohang->save();
         $giohang=GioHang::where("idNguoiDung",Auth::user()->id)->get();
         return view("pages.giohang",["giohang"=>$giohang]);
        }else{
          return redirect('dangnhap');
        }
         
    }

    public function getgioHang(){
         $giohang=GioHang::where("idNguoiDung",Auth::user()->id)->get();
         return view("pages.giohang",["giohang"=>$giohang]);
    }

     public function muaHang(Request $request){
         $this->validate($request,
        [
          'Ten'=>'required|min:3|max:40',
          'DiaChi'=>'required|min:3|max:400',
          'SoDienThoai'=>'required|min:3|max:40',
          'Email'=>'required',
          'ThongTin'=>'required|min:3|max:40000',
          'TongTien'=>'required|min:3|max:400',
        ],
        [
            'Ten.required'=>'ban chua nhap ten ',
            'Ten.min'=>'Ten the loai min la 3 ky tu',
            'Ten.max'=>'Ten the loai max la 40 ky tu',
            'DiaChi.required'=>'ban chua nhap DiaChi',
            'DiaChi.min'=>'DiaChi the loai min la 3 ky tu',
            'DiaChi.max'=>'DiaChi the loai max la 400 ky tu',
            'SoDienThoai.required'=>'ban chua nhap SoDienThoai',
            'SoDienThoai.min'=>'SoDienThoai the loai min la 3 ky tu',
            'SoDienThoai.max'=>'SoDienThoai the loai max la 40 ky tu',
            'ThongTin.required'=>'ban chua nhap ThongTin',
            'ThongTin.min'=>'ThongTin the loai min la 3 ky tu',
            'ThongTin.max'=>'ThongTin the loai max la 40000 ky tu',
            'TongTien.required'=>'ban chua nhap TongTien',
            'TongTien.min'=>'TongTien the loai min la 3 ky tu',
            'TongTien.max'=>'TongTien the loai max la 400 ky tu',
            'Email.required'=>'ban chua nha email',
           
           
        ]);

      $muahang=new MuaHang;
      $muahang->hoten=$request->Ten;
      $muahang->diachi=$request->DiaChi;
      $muahang->sodienthoai=$request->SoDienThoai;
       $muahang->email=$request->Email;
        $muahang->thongtin=$request->ThongTin;
         $muahang->tongtien=$request->TongTien;
      $muahang->save();
      return redirect("trangchu")->with('thongbao','mua hang thành công');
    }


   public function xoaGioHang($id){
             $giohang=GioHang::find($id);
             $giohang->delete();
             return redirect("giohang");
   }

    



    public function getNguoiDung(){
         $user= Auth::user();
         if (Auth::check()) {
       $giohang=GioHang::where("idNguoiDung",Auth::user()->id)->get();
      
         return view("pages.user",["nguoidung"=>$user,"giohang"=>$giohang]);
      }
         return view("pages.user",["nguoidung"=>$user]);
    }


      public function postSuaNguoiDung(Request $request){
          $this->validate($request,
        [
          'name'=>'required|min:3|max:40',
        ],
        [
          'name.required'=>'ban chua nhap ten user',
            'name.min'=>'Ten the loai min la 3 ky tu',
            'name.max'=>'Ten the loai max la 40 ky tu',
           
        ]);
      $user=Auth::user();
      $user->name=$request->name;
      $user->email=$request->email;
      if ($request->changepassword=="on") {
         $this->validate($request,
        [
          'password'=>'required|min:3',
          'passwordAgain'=>'required|same:password'
        ],
        [
            'password.required'=>'ban chua nhap ten user',
            'password.min'=>'Ten the loai min la 3 ky tu',
            'passwordAgain.required'=>'ban chua nhap passwordAgaint',
            'passwordAgain.same'=>'mat khau khong chun khop'
        ]);
         $user->password=bcrypt($request->password);
      }
    
      $user->save();
      return redirect('nguoidung')->with('thongbao',' thanh cong');
     }



     public function timkiem(Request $request){
        $tukhoa=$request->tukhoa;
        $chitiet=ChiTiet::where('TieuDe','like',"%$tukhoa%")->orwhere('TomTat','like',"%$tukhoa%")->take(32)->paginate(8);
        return view('pages.timkiem',["chitiet"=>$chitiet,"tukhoa"=>$tukhoa]);
     }
}

