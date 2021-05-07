
<!-- Bootstrap 4 -->
<script src="{{ asset('/style_default/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/style_default/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('/style_default/dist/js/demo.js')}}"></script> --}}
<!-- DataTables  & Plugins -->
<script src="{{ asset('/style_default/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('/style_default/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('/style_default/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('/style_default/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('/style_default/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('/style_default/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- date-range-picker -->
{{-- <script src="{{ asset('/style_default/plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
<!-- bootstrap color picker -->
{{-- <script src="{{ asset('/style_default/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script> --}}

<script>
  $(function () {
    // $('#reservation').daterangepicker()
     // Summernote
     $('.summernote').summernote()
     //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $(".example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "ordering": true, "info": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "ordering": true, "info": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    // $('.example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
    
  });
</script>