@extends("layout.index")
@section('content')
<!-- Page Content -->
  @if(session('thongbao'))
                            
                               <script >
                                   alert("Mua Hàng thành công");
                               </script>
                           
                        @endif
    <div class="container">

    	@include("layout.slide")
        <div class="baohanh">
          <p style="text-align: center;">Tất cả sản phẩm đều được bảo hành 12 Tháng — <span style="color: #999999;">Đền 10 Lần giá trị đơn hàng nếu không đúng da thật!</span></p>
          <hr class="ngans">
        </div>
        <div class="space20" style="margin: 10px;"></div>

 <div class="row main-left">

          @foreach($theloai as $tl)
          <?php
            $data=$tl->chitiet->where("NoiBat",1)->take(5);
		    $ct1=$data->shift();//tra mang
		    ?>
          <div class="col-md-3">  
          <a href="theloaisp/{{$tl->id}}">
          	<div class="card text-center">
                   		<img class="card-img-top img-responsive" src="upload/chitiet/{{$ct1['Hinh']}}" alt="Card image cap" style="height: 300px;">
                   		<div class="card-body">
                   			<h4 class="card-title">{{$tl->Ten}}</h4>
                   		</div>
                   	</div>     
          </a>    	
          </div>
          @endforeach
        <!-- /.row -->
    </div>
        
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
    <div class="noidungduoi">
    	<div class="container">
    		<div class="row">
    		<div class="col-md-6">
    		  	<div class="anh3">
    		  		<img src="upload/noidung/{{$noidung->Hinh1}}" class="img-responsive">
    		  	</div>
    		</div>
    		<div class="col-md-6">
    		  	<div class="text_custom panel-widget-style panel-widget-style-for-w5d0c5b6297025-0-0-1">
    		  		<h3 class="widget-title">{{$noidung->TieuDe1}}</h3>
    		  		<div class="textwidget">
    		  			<div class="row">
    		  				<div class="col-md-2"></div>
    		  				<div class="col-md-8" style="text-align: justify;">
    		  				  	<p style="text-align: justify;">
    		  				       {!!$noidung->NoiDung1!!}
    		  			       </p>
    		  				</div>
    		  				<div class="col-md-2"></div>
    		  			</div>
                </div>
            </div>
    		</div>

    	</div>
    	<div class="row">
   
    		<div class="col-md-6">
    		  	<div class="text_custom panel-widget-style panel-widget-style-for-w5d0c5b6297025-0-0-1">
    		  		<h3 class="widget-title">{{$noidung->TieuDe2}}</h3>
    		  		<div class="textwidget">
    		  			<div class="row">
    		  				<div class="col-md-2"></div>
    		  				<div class="col-md-8" style="text-align: justify;">
    		  				  	<p style="text-align: justify;">
    		  				{!!$noidung->NoiDung2!!}
    		  			</p>
    		  				</div>
    		  				<div class="col-md-2"></div>
    		  			</div>
                </div>
            </div>
    		</div>
    		<div class="col-md-6">
    		  	<div class="anh3">
    		  		<img src="upload/noidung/{{$noidung->Hinh2}}" class="img-responsive">
    		  	</div>
    		</div>
    	</div>
    	</div>
    	<div class="row">
            <div class="col-md-6">
    		  	
    		</div>
    		<div class="col-md-6">
    		  	<div class="text_custom panel-widget-style panel-widget-style-for-w5d0c5b6297025-0-0-1">
    		  		<h3 class="widget-title">{{$noidung->TieuDe3}}</h3>
    		  		<div class="textwidget">
    		  			<div class="row">
    		  				<div class="col-md-2"></div>
    		  				<div class="col-md-8" style="text-align: justify;">
    		  				  	<p style="text-align: justify;">
    		  				    {!!$noidung->NoiDung3!!}
    		  				
    		  			</p>
    		  				</div>
    		  				<div class="col-md-2"></div>
    		  			</div>
                </div>
            </div>
    		</div>
 
    	</div>
    	</div>
    </div>
@endsection