 </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin__asset/bower_components/jquery/dist/jquery.min.js"></script>
admin__asset/
    <!-- Bootstrap Core JavaScript -->
    <script src="admin__asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin__asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin__asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin__asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin__asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="admin__asset/ckeditor/ckeditor.js" ></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
     @yield('script')