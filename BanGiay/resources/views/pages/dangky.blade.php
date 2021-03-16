
@extends("layout.index")
@section('content')
 <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder dangky">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng ký tài khoản</div>
				  	<div class="panel-body">
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
				    	<form action="dangky" method="post">
				    		<input type="hidden" name="_token" value="{{csrf_token('')}}">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="Ten" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="Email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="Password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="PasswordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-default">Đăng ký
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <!-- end slide -->
    </div>
@endsection