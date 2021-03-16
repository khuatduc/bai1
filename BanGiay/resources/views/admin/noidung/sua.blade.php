@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">NoiDung
                            <small>Sua</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/noidung/sua/{{$noidung->id}}" method="POST" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                            @if(count($errors)>0)
                            @foreach($errors->all() as $er)
                            <div class="alert alert-warning" role="alert">
                                {{$er}}
                            </div>
                           
                            @endforeach
                            @endif
                            @if(session('thongbao'))
                            <div class="alert alert-success" role="alert">
                                {{session('thongbao')}}
                            @endif
                            @if(session('loi'))
                            <div class="alert alert-warning" role="alert">
                                {{session('loi')}}
                           
                            </div>
                             @endif
                            <div class="form-group">
                                <label>Tieu De 1</label>
                                <input class="form-control" name="TieuDe1" value="{{$noidung->TieuDe1}}" />
                            </div>
                            <div class="form-group">
                                <label>Noi Dung 1</label>
                               <textarea class="form-control ckeditor" rows="3" id="demo" name="NoiDung1">{{$noidung->NoiDung1}}</textarea>
                            </div>
                            
                             <div class="form-group">
                                <label>Images 1</label>
                                <input type="file" name="Hinh1" class="form-control">
                                <div><img src="upload/noidung/{{$noidung->Hinh1}}" style="width: 55px   "></div>
                            </div>
                             <div class="form-group">
                                <label>Tieu De 2</label>
                                <input class="form-control" name="TieuDe2" value="{{$noidung->TieuDe2}}"  />
                            </div>
                            <div class="form-group">
                                <label>Noi Dung 2</label>
                               <textarea class="form-control ckeditor" rows="3" id="demo" name="NoiDung2">{{$noidung->NoiDung2}}</textarea>
                            </div>
                            
                           <div class="form-group">
                                <label>Images 2</label>
                                <input type="file" name="Hinh2" class="form-control">
                                <div><img src="upload/noidung/{{$noidung->Hinh2}}" style="width: 55px   "></div>
                            </div>
                             <div class="form-group">
                                <label>Tieu De 3</label>
                                <input class="form-control" name="TieuDe3" value="{{$noidung->TieuDe3}}" />
                            </div>
                            <div class="form-group">
                                <label>Noi Dung 3</label>
                               <textarea class="form-control ckeditor" rows="3" id="demo" name="NoiDung3">{{$noidung->NoiDung3}}</textarea>
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