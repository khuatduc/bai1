<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
     public function getDanhSach(){
         $user=User::all();
     	return view('admin.user.danhsach',['user'=>$user]);
     }

     public function getThem(){
     	return view('admin.user.them');
     }

     public function postThem(Request $request){
     	    $this->validate($request,
     		[
     			'ten'=>'required|min:3|max:40',
     			'email'=>'required|unique:users,email',
     			'password'=>'required|min:3',
                'passwordAgaint'=>'required|same:password'
     		],
     		[
     	    'ten.required'=>'ban chua nhap ten user',
            'ten.min'=>'Ten the loai min la 3 ky tu',
            'ten.max'=>'Ten the loai max la 40 ky tu',
            'email.required'=>'ban chua nha email',
            'email.unique'=>'email da ton tai',
            'password.required'=>'ban chua nhap ten user',
            'password.min'=>'Ten the loai min la 3 ky tu',
            'passwordAgaint.required'=>'ban chua nhap passwordAgaint',
            'passwordAgaint.same'=>'mat khau khong chun khop'
     		]);
     	$user=new User;
     	$user->name=$request->ten;
     	$user->email=$request->email;
     	$user->password=bcrypt($request->password);
     	$user->quyen=$request->quyen;
     	$user->save();
     	return redirect('admin/user/them')->with('thongbao','Them user thanh cong');
     }

      public function getSua($id){
          $user=User::find($id);
     	return view('admin.user.sua',['user'=>$user]);
     }

      public function postSua(Request $request,$id){
     	    $this->validate($request,
     		[
     			'ten'=>'required|min:3|max:40',
     		],
     		[
     	    'ten.required'=>'ban chua nhap ten user',
            'ten.min'=>'Ten the loai min la 3 ky tu',
            'ten.max'=>'Ten the loai max la 40 ky tu',
           
     		]);
     	$user=User::find($id);
     	$user->name=$request->ten;
     	$user->email=$request->email;
     	if ($request->changepassword=="on") {
     		 $this->validate($request,
     		[
     			'password'=>'required|min:3',
                'passwordAgaint'=>'required|same:password'
     		],
     		[
            'password.required'=>'ban chua nhap ten user',
            'password.min'=>'Ten the loai min la 3 ky tu',
            'passwordAgaint.required'=>'ban chua nhap passwordAgaint',
            'passwordAgaint.same'=>'mat khau khong chun khop'
     		]);
     		 $user->password=bcrypt($request->password);
     	}
     	
     	$user->quyen=$request->quyen;
     	$user->save();
     	return redirect('admin/user/sua/'.$id)->with('thongbao','sua user thanh cong');
     }

     public function getXoa($id){
     	$user=User::find($id);
     	$user->delete();
     	return redirect('admin/user/danhsach');
     }

     public function dangNhapAdmin(){
        return view('admin.login');
     }

     public function postDangxuatAdmin(Request $request) {
        $this->validate($request,
            [
                "email"=>"required",
                "password"=>"required|min:3|max:40"
            ],
            [
                "email.required"=>"ban chua nhap email",
                "password.required"=>"ban chua nhap password",
                 "password.min"=>"password phai co it nhat 3 ki tu",
                "password.max"=>"password phai co nhieu nhat 40 ki tu",
            ]);
          if (Auth::attempt(["email"=>$request->email,"password"=>$request->password])) {
             return redirect('admin/theloai/danhsach');
          }else{
            return redirect('admin/dangnhap')->with('thongbao','danh nhap ko thanh cong');
          }
     }

     public function logoutAdmin(){
        Auth::logout();
        return redirect('admin/dangnhap');
     }

}
