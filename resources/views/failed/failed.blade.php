@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
      <h2 class="card-title">Halaman Failed CMS TMI</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

<div class="table-responsive">

        <table class="table table-striped"  id="example2" width="100%" cellspacing="0">
            <thead>
              <tr>
              <th>Queue</th>
              <th>Payload</th>
              <th>Exception</th>
              <th>Waktu</th>
              </tr>
            </thead>
          </table>
        </div>
        <br>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        fill_datatable();
function fill_datatable(filter_branch= ''){
    var dataTable = $('#example2').DataTable({
        processing : true,
        serverSide : true,
        ajax:{
            url: "{{ route('failed.index') }}",
            data:{filter_branch:filter_branch}
        },
        columns: [
           {
            data:'queue',
            name:'queue'
           },
           {
            data:'payload',
            name:'payload'
           },
           {
            data:'exception',
            name:'exception'
           },
           {
            data:'failed_at',
            name:'failed_at'

           }
        ]
    });
}
$('#filter').click(function(){
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

var filter_branch = $('#filter_branch').val();

if(filter_branch != '' && filter_branch != '')
{
$('#example2').DataTable().destroy();
fill_datatable(filter_branch);

}
else {
    alert('Isi Data Filter Dengan Lengkap');
}

});
$('#reset').click(function(){
$('#filter_branch').val('');
$('#example2').DataTable().destroy();
fill_datatable();
});
    });
</script>

@endsection
