@extends('layout.index')
@section('content')
   <div class="container">
        <div class="row cach">
                  <div class="row">
                    <div class="col-md-6">
                         <img src="upload/chitiet/{{$chitiet->Hinh}}" class="img-responsive">
                    </div>
                      <div class="col-md-6 ">
                      <div>{!!$chitiet->NoiDung!!}</div>
                       <form action="giohang" method="post">
                           <input type="hidden" name="_token" value="{{csrf_token('')}}">
                           <div class="row">
                             <div class="col-md-6">
                                  <div class="giaca">Giá Sản Phẩm: {{number_format($chitiet->gia)}}đ</div>
                             </div>
                             <div class="col-md-6">
                                  <div class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="1" name="SoLuong">
                                            </div>
                                        </div>
                                    </div>
                             </div>
                           </div>
                       
                        
                                   <div class="anform" style="visibility:hidden;"> <input name="Hinh" value="{{$chitiet->Hinh}}">
                                    <input type="" name="TieuDe" value="{{$chitiet->TieuDe}}"> 
                                    <input type="text" name="Gia" value="{{$chitiet->gia}}"></div>
                                    <button type="submit" name="add-to-cart" value="86159" class="single_add_to_cart_button button alt">Thanh toán ngay</button>
                      </form>
                       </div>
                  </div>
                   </form>
                  
           </div>
             


        



           <div class="row">
               <div class="col-md-12">

               

                <div class="panel panel-default">
                    <div class="panel-heading" align="center"><b>Sản phẩm bán chạy</b></div>
                    <div class="panel-body">
                        <!-- item -->
                        <div class="row" style="margin-top: 10px; padding-left: 7px;">
                        @foreach($chitietnoibat as $nb)
                        
                            <div class="col-md-3" align="center">
                                <a href="chitiet/{{$nb->id}}/{{$nb->TieuDeKhongDau}}.html">
                               <img class="img-responsive" src="upload/chitiet/{{$nb->Hinh}}" alt="" style="width: 150px;">
                                </a>
                           
                            
                                <a href="chitiet/{{$nb->id}}/{{$nb->TieuDeKhongDau}}.html"><b>{!!$nb->TomTat!!}</b></a>
                            </div>
                            <div class="break"></div>

                              @endforeach
                        </div>
                        <!-- end item -->
                       
                      
                    </div>
                </div>
                
            </div>
           </div>
         <div class="row">
                      @if(Auth::check())
                <div class="well">
                    @if(session('thongbao'))
                    {{session('thongbao')}}
                    @endif
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="comment/{{$chitiet->id}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token('')}}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="NoiDung"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
                
                <hr>
                 @endif
                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($chitiet->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>{{$cm->create_at}}</small>
                        </h4>
                       {{$cm->NoiDung}}
                    </div>
                </div>
               @endforeach
                   </div>
       
            </div>
        <!-- /.row -->

    <!-- end Page Content -->

@endsection