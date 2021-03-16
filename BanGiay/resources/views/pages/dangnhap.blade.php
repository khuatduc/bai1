@extends("layout.index")
@section('content')
 <!-- Page Content -->
    <div class="container motnhe">

    	<!-- slider -->
    	<div class="row carousel-holder" style="margin: 40px 0px;">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
				    	<form method="Post" action="dangnhap">
				    		@if(session('thongbao'))
				    		<div class="alert alert-danger" role="alert">
				    			{{session('thongbao')}}
				    		</div>
				    		@endif
				    		@if(count($errors)>0)
				    		<div class="alert alert-danger" role="alert">
				    		@foreach($errors->all() as $er)
				    			{{$er}}
				    
				    		@endforeach
				    		</div>
				    		@endif
				    		<input type="hidden" name="_token" value="{{csrf_token('')}}">
							<div>
				    			<label style="padding: 2px 10px;">Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" 
							  	>
							</div>
							<br>	
							<div>
				    			<label  style="padding: 2px 10px;">Mật khẩu</label>
							  	<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<br>
							<button type="submit" class="btn btn-default" style="text-align: center;">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection