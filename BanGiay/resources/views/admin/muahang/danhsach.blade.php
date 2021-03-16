 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Don Hang
                            <small>Danh sách đơn</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                    <div class="alert alert-success" role="alert">
                        {{session('thongbao')}}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Họ tên</th>
                                <th>Địa chỉ</th>
                                <th>Điện THoại</th>
                                <th>Email</th>
                                 <th>Thông Tin</th>
                                  <th>Tổng tiền</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($muahang as $lt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$lt->id}}</td>
                                <td>{{$lt->hoten}}</td>
                                <td>{{$lt->diachi}}</td>
                                <td>{{$lt->sodienthoai}}</td>
                                <td>{{$lt->email}}</td>
                                 <td>{{$lt->thongtin}}</td>
                                  <td>{{$lt->tongtien}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/muahang/xoa/{{$lt->id}}"> Xóa</a></td>
                              
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