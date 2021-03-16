<?php

use Illuminate\Support\Facades\Route;
use App\TheLoai;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@dangNhapAdmin');
Route::post('admin/dangnhap','UserController@postDangxuatAdmin');
Route::get('admin/logout','UserController@logoutAdmin');

Route::group(['prefix'=>'admin','middleware'=>"AdminLogin"], function () {
      
      Route::group(['prefix'=>'theloai'], function () {
      
      Route::get('danhsach','TheLoaiController@getDanhSach');

      Route::get('them','TheLoaiController@getThem');
      Route::post('them','TheLoaiController@postThem');
      
      Route::get('sua/{id}','TheLoaiController@getSua');
      Route::post('sua/{id}','TheLoaiController@postSua');

      Route::get('xoa/{id}','TheLoaiController@getXoa');
      });


      Route::group(['prefix'=>'loaisp'], function () {
      
      Route::get('danhsach','LoaiSPController@getDanhSach');

      Route::get('them','LoaiSPController@getThem');
      Route::post('them','LoaiSPController@postThem');
      
      Route::get('sua/{id}','LoaiSPController@getSua');
      Route::post('sua/{id}','LoaiSPController@postSua');
      
      Route::get('xoa/{id}','LoaiSPController@getXoa');
      });


      Route::group(['prefix'=>'chitiet'], function () {
      
      Route::get('danhsach','ChiTietController@getDanhSach');

      Route::get('them','ChiTietController@getThem');
      Route::post('them','ChiTietController@postThem');
      
      Route::get('sua/{id}','ChiTietController@getSua');
      Route::post('sua/{id}','ChiTietController@postSua');
      
      Route::get('xoa/{id}','ChiTietController@getXoa');
      });


      Route::group(['prefix'=>'ajax'], function () {
      Route::get('chitiet/{id}','AjaxController@getAjax');
      });


      Route::group(['prefix'=>'comment'], function () {
      Route::get('xoa/{id}/{idChiTiet}','CommentController@getXoa');
      });


      Route::group(['prefix'=>'slide'], function () {
      
      Route::get('danhsach','SlideController@getDanhSach');

      Route::get('them','SlideController@getThem');
      Route::post('them','SlideController@postThem');
      
      Route::get('sua/{id}','SlideController@getSua');
      Route::post('sua/{id}','SlideController@postSua');
      
      Route::get('xoa/{id}','SlideController@getXoa');
      });


      Route::group(['prefix'=>'noidung'], function () {
      
      Route::get('danhsach','NoiDungController@getDanhSach');

      Route::get('them','NoiDungController@getThem');
      Route::post('them','NoiDungController@postThem');
      
      Route::get('sua/{id}','NoiDungController@getSua');
      Route::post('sua/{id}','NoiDungController@postSua');
      
      Route::get('xoa/{id}','NoiDungController@getXoa');
      });

      

      Route::group(['prefix'=>'muahang'], function () {
      
      Route::get('danhsach','MuaHangController@getDanhSach');
      Route::get('xoa/{id}','MuaHangController@getXoa');
      });


      Route::group(['prefix'=>'user'], function () {
      
      Route::get('danhsach','UserController@getDanhSach');

      Route::get('them','UserController@getThem');
      Route::post('them','UserController@postThem');
      
      Route::get('sua/{id}','UserController@getSua');
      Route::post('sua/{id}','UserController@postSua');
      
      Route::get('xoa/{id}','UserController@getXoa');
      });
});

Route::get('dangnhap','PagesController@getDangNhap');
Route::post('dangnhap','PagesController@postDangNhap');
Route::get('dangxuat','PagesController@getDangXuat');
Route::get('nguoidung','PagesController@getNguoiDung');
Route::post('nguoidung','PagesController@postSuaNguoiDung');
Route::get('dangky','PagesController@getDangKy');
Route::post('dangky','PagesController@postDangKy');
Route::post('comment/{id}','CommentController@postComment');
Route::get('trangchu','PagesController@trangChu');
Route::get('giohang','PagesController@getgioHang');
Route::post('muahang','PagesController@muaHang');
Route::get('xoagiohang/{id}','PagesController@xoaGioHang');
Route::post('giohang','PagesController@postgioHang');
Route::get('lienhe','PagesController@lienHe');
Route::get('theloaisp/{id}','PagesController@getTheLoai');
Route::get('loaisp/{id}/{TEN_KHONG_DAU}.html','PagesController@loaiSP');
Route::get('chitiet/{id}/{TEN_KHONG_DAU}.html','PagesController@chitiet');


Route::post('timkiem','PagesController@timkiem');



