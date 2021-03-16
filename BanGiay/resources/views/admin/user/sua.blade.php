@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người Dùng
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                          @if(count($errors)>0)
                            <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $er)
                                  {{$er}}<br>
                             @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success" role="alert">
                                {{session('thongbao')}}
                            </div>
                        @endif
                            <div class="form-group">
                                <label>Ten</label>
                                <input class="form-control" name="ten" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" type="email" readonly="" value="{{$user->email}}" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changepassword" id="changepassword">
                                <label>Mật khẩu</label>
                                <input class="form-control password" name="password"  type="password" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input class="form-control password" name="passwordAgaint"  type="password" disabled="" />
                            </div>
                            <div class="form-group">
                                <label>Quyen Nguoi Dung</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" 
                                     @if($user->quyen==0)
                                     {{"checked"}}
                                     @endif
                                     type="radio">Nguoi Thuong
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                     @if($user->quyen==1)
                                     {{"checked"}}
                                     @endif
                                    type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Xac Nhan</button>
                            <button type="reset" class="btn btn-default">Lam Moi</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
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
