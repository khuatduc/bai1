 @extends('admin.layout.index')
 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Noi dung
                            <small>Danh sach</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Hinh1</th>
                                <th>TieuDe1</th>
                                 <th>NoiDung1</th>
                                <th>Hinh2</th>
                                <th>TieuDe2</th>
                                 <th>NoiDung2</th>
                                <th>TieuDe3</th>
                                 <th>NoiDung3</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($noidung as $nd)
                            <tr class="odd gradeX" align="center">
                                <td>{{$nd->id}}</td>
                                <td>{{$nd->Hinh1}}</td>
                                <td>{{$nd->TieuDe1}}</td>
                                <td>{{$nd->NoiDung1}}</td>
                                <td>{{$nd->Hinh2}}</td>
                                <td>{{$nd->TieuDe2}}</td>
                                <td>{{$nd->NoiDung2}}</td>
                                <td>{{$nd->TieuDe3}}</td>
                                <td>{{$nd->NoiDung3}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/noidung/xoa/{{$nd->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/noidung/sua/{{$nd->id}}">Edit</a></td>
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