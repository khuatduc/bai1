@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm Sản phẩm
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/chitiet/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @if(count($errors)>0)
                            @foreach($errors->all() as $err)
                            <div class="alert alert-danger" role="alert">
                                {{$err}}
                            </div>
                            @endforeach
                            @endif
                            @if(session('thanhcong'))
                             <div class="alert alert-success" role="alert">
                                  {{session('thanhcong')}}
                             </div>
                            @endif
                             @if(session('loi'))
                               <div class="alert alert-success" role="alert">
                                  {{session('loi')}}
                             </div>
                            @endif
                            <div class="form-group">
                                <label>TheLoai</label>
                                <select class="form-control" name="theloai" id="theloai">
                                    @foreach($theloai as $tl)
                                     <option value="{{$tl->id}}" >{{$tl->Ten}}</option>
                                    @endforeach
                            </select>
                            </div>
                             <div class="form-group">
                                <label>LoaiSP</label>
                                <select class="form-control" name="loaisp" id="loaisp">
                                    @foreach($loaisp as $lt)
                                     <option value="{{$lt->id}}" >{{$lt->Ten}}</option>
                                    @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Tieu De</label>
                                <input class="form-control" name="tieude" placeholder="nhập Tieu De" />
                            </div>
                            <div class="form-group">
                                <label>Tom Tat</label>
                                <textarea class="form-control ckeditor" rows="3" id="demo" name="tomtat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Noi Dung</label>
                                <textarea class="form-control ckeditor" rows="3" id="demo" name="noidung"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hinh anh</label>
                                <input type="file" name="hinh" class="form-control">
                            </div>
                             <div class="form-group">
                                <label>Gia</label>
                                <input type="text" name="gia" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Noi Bat</label>
                                <label class="radio-inline">
                                    <input name="noibat" value="1" checked="" type="radio">Hien Thi
                                </label>
                                <label class="radio-inline">
                                    <input name="noibat" value="0" type="radio">Khong Hien Thi
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Xac nhan</button>
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
 <script type="text/javascript">
        $(document).ready(function(){
           $('#theloai').change(function(){
            var idTheLoai=$(this).val();
            $.get("admin/ajax/chitiet/"+idTheLoai,function(data){
             $('#loaisp').html(data);
        });
           });
        });
        </script>
@endsection