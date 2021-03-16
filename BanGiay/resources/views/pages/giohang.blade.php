@if(Auth::check())
@extends('layout.index')
@section('content')

<body>
    <!-- Page Preloder -->
   


    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="trangchu"><i class="fa fa-home"></i> Trang chủ</a>
                        <a href="./shop.html">Cửa Hàng</a>
                        <span>Giỏ Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th class="p-name">Tên Sản Phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Xóa</th>
									<th>Sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  $sum=0;
                                  $str1="";
                                  $str2="";
                                ?>
                                @foreach($giohang as $gh)
                                <tr>
                                    <td class="cart-pic first-row"><img src="upload/chitiet/{{$gh->Hinh}}" alt="" style="width: 100px;"></td>
                                    <td class="cart-title first-row">
                                        <h5>{{$gh->TieuDe}}</h5>

                                    </td>
                                    <td class="p-price first-row">{{number_format($gh->Gia)}}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$gh->SoLuong}}">
                                                <?php 
                                         $str1=$str1.($gh->TieuDe)."|".($gh->SoLuong)."|".($gh->Hinh)."**";
                                         ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{number_format(($gh->Gia)*($gh->SoLuong))}}</td>
                                    <td class="close-td first-row">
                                       <a href="xoagiohang/{{$gh->id}}">
                                        <i class="ti-close"></i></a>
                                     </td>
									<td class="close-td first-row"><i class="ti-save"></i></td>
                                </tr>
                                   <?php
                                  $sum=$sum+(($gh->Gia)*($gh->SoLuong));
                                ?>  
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <hr style="margin-top:-20px;">
<div id="page-wrapper1">
    <form action="muahang" method="POST">
                            <input type="hidden" name="_token"  value="{{csrf_token()}}">
                             @if(count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $er)
                                  {{$er}}<br>
                             @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success" role="alert">
                               <script type="">
                                   alert(session('thongbao'));
                               </script>
                            </div>
                        @endif
            <div class="container">
               <div class="col-md-6 trait">
                      <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Thông Tin Cá Nhân
                        </h3>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12" style="padding-bottom:120px">
                
                        
                            <div class="form-group">
                                <label>Họ và Tên <sup style="color: red;">*</sup></label>
                                <input  type="text" class="form-control" name="Ten" placeholder="Họ và Tên" />
                            </div>
                             <div class="form-group">
                                <label>Địa Chỉ <sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control" name="DiaChi" placeholder="Địa Chỉ" />
                            </div>
                             <div class="form-group">
                                <label>Số Điện Thoại <sup style="color: red;">*</sup></label>
                                <input type="text"  class="form-control" name="SoDienThoai" placeholder="Số Điện Thoại" />
                            </div>
                             <div class="form-group">
                                <label>Email <sup style="color: red;">*</sup></label>
                                <input type="Email"  class="form-control" name="Email" placeholder="Email" />
                            </div>

                             <div class="form-group" style="visibility:hidden;">
                                <label>Thông Tin <sup style="color: red;">*</sup></label>
                                <input  class="form-control" name="ThongTin" value="{{$str1}}"  />
                            </div>
                            <div class="form-group" style="visibility:hidden;">
                                <label>Tổng tiển <sup style="color: red;">*</sup></label>
                                <input  class="form-control" name="TongTien" value="{{$sum}}"  />
                            </div>

                        <div class="col-lg-12 offset-lg-0">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">TỔNG TIỀN <span>{{number_format($sum)}}</span></li>
                                    <li class="cart-total">TỔNG TIỀN <span>{{number_format($sum)}}</span></li>
                                </ul>
                                
                            </div>
                        </div>
                 
                          
                            <button type="submit" class="btn btn-default proceed-btn">Đặt Hàng</button>

                  
                    </div>
                </div>
               </div>
                <div class="col-md-6 phaip">
                    <div class="col-md-12">
                        <h3 class="page-header1">Thông Tin Thêm
                        </h3>
                        <div style="padding-bottom: 10px;">chú thích thêm (tùy chọn)</div>
                        <textarea class="ChuThich" style="width: 95%; height: 300px;" >yêu cầu thêm của bạn khi giao hàng...
                        </textarea>
                    </div>


               </div>
             
                <!-- /.row -->
            </div>
              </form>
            <!-- /.container-fluid -->
        </div>
    <!-- Shopping Cart Section End -->	

   
@endsection
@endif