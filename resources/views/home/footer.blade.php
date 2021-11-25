<DOCTYPE html>
<footer class="main-footer">
<div class="float-right d-none d-sm-block">
     <!-- <b>Version</b> 3.2.0-rc -->
    </div>
    <strong>Copyright &copy; 2021 <a href="#">Project</a>.</strong> All rights reserved.

    <script src="{{ asset('assets') }}/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets') }}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets') }}/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets') }}/admin/dist/js/demo.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

</script>
@yield('js')
</footer>
</html>