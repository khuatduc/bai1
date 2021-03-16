@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">The Loai
                            <small>Them Moi</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        <form action="admin/theloai/them" method="POST">
                            <input type="hidden" name="_token"  value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="Ten" placeholder="nhập tên thể loại" />
                            </div>
                            <button type="submit" class="btn btn-default">Xac nhan</button>
                            <button type="reset" class="btn btn-default">Lam moi</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection