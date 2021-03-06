 <!-- Page Preloder -->
    

    <!-- Header Section Begin -->
    
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                       Sanphamkhonggiohan@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +84 08.432.89.278
                    </div>
                </div>
                <div class="ht-right">
                     @if(Auth::check())
                         
                    <a href="nguoidung" class="login-panel"><i class="fa fa-user"></i>
                          {{Auth::user()->name}}
                          </a>
                           @else
                    <a href="#" class="login-panel"><i class="fa fa-user"></i>
                           {{"Login"}}
                             </a>
                           @endif
                  
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="image/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="image/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">Việt Nam</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="#">
                                <img src="image/logo.png" alt=""> <span class="csslogo" style="font-weight: 900; color: #252525; font-size: 14px;">KhuatDuc</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">Danh mục</button>
                            <form action="timkiem" class="input-group" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm?">
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                         @if(Auth::check())
                         <ul class="nav-right">
                             <?php 
                                                 $i=0;
                                             ?>
                              @foreach($giohang as $gh)
                                        <?php 
                                        $i=$i+1;
                                         ?>
                              @endforeach
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>{{$i}}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                       <a href="giohang">  <table>
                                            <?php 
                                                 $sum=0;
                                             ?>
                                            <tbody>
                                                @foreach($giohang as $gh)
                                                <tr>
                                                    <td class="si-pic"><img src="upload/chitiet/{{$gh->Hinh}}" alt="" style="width: 50px;"></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>₫{{number_format($gh->Gia)}} x {{number_format($gh->SoLuong)}}</p>
                                                            <h6>{{$gh->TieuDe}}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <?php 
                                                      $sum=$sum+(($gh->Gia)*($gh->SoLuong))
                                                 ?>
                                                 @endforeach
                                            </tbody>
                                        </table></a>
                                    </div>
                                    <div class="select-total">
                                        <span>Tổng tiền:</span>
                                        <h5>₫{{number_format($sum)}}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">Xem giỏ hàng</a>
                                        <a href="#" class="primary-btn checkout-btn">Thanh Toán</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                           @else
                          <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="#">
                                    <i class="icon_bag_alt"></i>
                                  
                                    <span>0</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                           
                                                <tr>
                                                    <td class="si-pic"><img src="" alt="" style="width:0px;"></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p></p>
                                                            <h6></h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        
                                                    </td>
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>Tổng tiền:</span>
                                        <h5>0₫</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">Xem giỏ hàng</a>
                                        <a href="#" class="primary-btn checkout-btn">Thanh toán</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                           @endif
                      
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>DANH MỤC SẢN PHẨM</span>
                        <ul class="depart-hover">
                             
                            @foreach($theloai as $tl)
                             <li ><a href="theloaisp/{{$tl->id}}">{{$tl->Ten}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="trangchu">Trang chu</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="dangky">Đăng ký</a></li>
                        <li><a href="dangnhap">Đăng Nhập</a></li>
                        <li><a href="dangxuat">Đăng Xuất</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

   

    <!-- Product Shop Section Begin -->