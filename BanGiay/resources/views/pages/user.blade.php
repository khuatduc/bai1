@extends("layout.index")
@section('content')
 <!-- Page Content -->
    <div class="container dangky">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				    	<form action="nguoidung" method="post">
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
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" value="{{$nguoidung->name}}" placeholder="Username" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" value="{{$nguoidung->email}}" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	readonly
							  	>
							</div>
							<br>	
							<div>
								<input type="checkbox" id="changepassword" name="checkassword" style="margin-left:15px; ">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
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
    <!-- end Page Content -->
@endsection

@section('script')
     <script>
         $(document).ready(function(){
            $('#changepassword').change(function(){
                if ($(this).is(":checked")) {
                $('.password').removeAttr('disabled');
                }else{
                $('.password').attr('disabled','');
                }
            })
         })
     </script>
@endsection