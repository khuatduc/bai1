@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Them</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
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
                                <label>Ten</label>
                                <input class="form-control" name="Ten"  />
                            </div>
                            <div class="form-group">
                                <label>Noi Dung</label>
                               <textarea class="form-control ckeditor" rows="3" id="demo" name="NoiDung"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="Link"  />
                            </div>
                            
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" name="Hinh" class="form-control">
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