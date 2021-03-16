 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>Danh Sách Sản Phẩm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tieu De</th>
                                <th>Tom Tat</th>
                                <th>TheLoai</th>
                                <th>Loai SP</th>
                                <th>Gia</th>
                                <th>Noi bat</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chitiet as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->TieuDe}}
                                <p><img src="upload/chitiet/{{$tt->Hinh}}" style="width: 50px "></p>
                                </td>
                                <td>{{$tt->TomTat}}</td>
                                <td>{{$tt->loaisp->theloai->Ten}}</td>
                                <td>{{$tt->loaisp->Ten}}</td>
                                <td>{{number_format($tt->gia)}} vnđ</td>
                                <td>
                                    @if($tt->NoiBat==1)
                                    {{"co"}}
                                    @else
                                    {{"khong"}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/chitiet/xoa/{{$tt->id}}"> xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/chitiet/sua/{{$tt->id}}">sửa</a></td>
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