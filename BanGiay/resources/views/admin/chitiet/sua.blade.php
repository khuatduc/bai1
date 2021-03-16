@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa Sản Phẩm
                            <small>Sua</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                       <form action="admin/chitiet/sua/{{$chitiet->id}}" method="POST" enctype="multipart/form-data">
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
                                     <option 
                                    @if($chitiet->loaisp->theloai->id==$tl->id)
                                    {{"selected"}}
                                    @endif
                                     value="{{$tl->id}}" >{{$tl->Ten}}</option>
                                    @endforeach
                            </select>
                            </div>
                             <div class="form-group">
                                <label>loaisp</label>
                                <select class="form-control" name="loaisp" id="loaisp">
                                    @foreach($loaisp as $lt)
                                     <option 
                                    @if($chitiet->loaisp->id==$lt->id)
                                    {{"selected"}}
                                    @endif
                                     value="{{$lt->id}}" >{{$lt->Ten}}</option>
                                    @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label>Tieu De</label>
                                <input class="form-control" name="tieude" placeholder="Please Enter TieuDe"  value="{{$chitiet->TieuDe}}" />
                            </div>
                            <div class="form-group">
                                <label>Tom Tat</label>
                                <textarea class="form-control ckeditor" rows="3" id="demo" name="tomtat">
                                    {{$chitiet->TomTat}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Noi Dung</label>
                                <textarea class="form-control ckeditor" rows="3" id="demo" name="noidung">
                                     {{$chitiet->NoiDung}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hinh anh</label>
                                <input type="file" name="Hinh" class="form-control" value="{{$chitiet->Hinh}}"> 
                                <img src="upload/chitiet/{{$chitiet->Hinh}}" style="width: 50px">
                            </div>
                            <div class="form-group">
                                <label>Gia</label>
                                <input type="text" name="gia" class="form-control" value="{{$chitiet->gia}}"> 
                            </div>
                            <div class="form-group">
                                <label>Noi Bat</label>
                               
                                <label class="radio-inline">
                                    <input name="noibat" value="1"
                                     @if($chitiet->NoiBat==1)
                                      {{"checked" }}
                                      @endif 
                                      type="radio">Hien Thi
                                </label>
                                
                                <label class="radio-inline">
                                    <input name="noibat" value="0"
                                     @if($chitiet->NoiBat==0)
                                      {{"checked"}}
                                      @endif 
                                     type="radio">Khong Hien Thi
                                </label>
                                
                            </div>
                            <button type="submit" class="btn btn-default">Xac nhan</button>
                            <button type="reset" class="btn btn-default">Lam Moi</button>
                        <form>
                    </div>
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>NGUOI DUNG</th>
                                <th>NOI DUNG</th>
                                <th>NGAY DANG</th>
                                <th>Delete</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chitiet->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->user->name}}
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                               
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cm->id}}/{{$chitiet->id}}"> Delete</a></td>
                               
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
@section('script')
       <script> 
        $(document).ready(function(){
           $('#theloai').change(function(){
            var idTheLoai=$(this).val();
            $.get("admin/ajax/chitiet/"+idTheLoai,function(data){
             $('#loaisp').html(data);
        });
           });
        });</script>
@endsection