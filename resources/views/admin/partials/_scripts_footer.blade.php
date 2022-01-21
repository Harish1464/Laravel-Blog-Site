
<script src="{{asset('../Template/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('../Template/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{asset('../Template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('../Template/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('../Template/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('../Template/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('../Template/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('../Template/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('../Template/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('../Template/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('../Template/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('../Template/admin/dist/js/adminlte.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('../Template/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('../Template/admin//plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('../Template/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
</script>
@yield('js')
</body>
</html>
