@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loai SP
                            <small>Sua</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/loaisp/sua/{{$loaisp->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
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
                            <div class="form-group">
                                <select  name="idTheLoai" class="form-control">
                                    @foreach($theloai as $tl)
                                    <option 
                                    @if($tl->id==$loaisp->idTheLoai)
                                    {{"selected"}}
                                    @endif 
                                    value="{{$tl->id}}">{{$tl->Ten}}
                                   </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ten</label>
                                <input class="form-control" name="Ten" value="{{$loaisp->Ten}}" placeholder="Please Enter Ten" />
                              
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