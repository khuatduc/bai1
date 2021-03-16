 @extends('admin.layout.index')
 @section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">The Loai
                            <small>Danh Sach {{$theloai->Ten}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/theloai/sua/{{$theloai->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token('')}}">
                            <div class="form-group">
                                @if(count($errors)>0)
                                @foreach($errors->all() as $err)
                                <div class="alert alert-danger" role="alert">
                                    {{$err}}
                                </div>
                                @endforeach
                                @endif
                                @if(session('thongbao'))
                                <div class="alert alert-success" role="alert">
                                    {{session('thongbao')}}
                                </div>
                                @endif
                                <label>Name</label>
                                <input class="form-control" name="Ten" value="{{$theloai['Ten']}}" placeholder="Please Enter Username" />
                            </div>
                            <button type="submit" class="btn btn-default">Xac Nhan</button>
                            <button type="reset" class="btn btn-default">Lam moi</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection