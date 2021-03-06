<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - Khuat Duc</title>

    <!-- Bootstrap Core CSS -->
    <base href="{{asset('')}}">
    <link href="admin__asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin__asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin__asset/dist/css/tycss.css" rel="stylesheet">
    <link href="admin__asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin__asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin__asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin__asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>
        @include('admin.layout.header')
        <!-- Page Content -->
        @yield('content')
        <!-- /#page-wrapper -->
        @include('admin.layout.footer')

   
</body>

</html>
