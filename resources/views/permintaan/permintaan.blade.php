@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
      <h2 class="card-title">Halaman Data Permintaan Barang</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
<div class="table-responsive">

        <table class="table table-striped"  id="example2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Nomor PO</th>
                <th>PB Header ID</th>
                <th>Flag Sent</th>
                <th>Tanggal PO </th>
                <th>Updated At </th>
              </tr>
            </thead>
          </table>
        </div>
        <br>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        fill_datatable();
function fill_datatable(filter_branch= '',filter_type=''){
    var dataTable = $('#example2').DataTable({
        processing : true,
        serverSide : true,
        ajax:{
            url: "{{ route('permintaan.index') }}",
            data:{filter_branch:filter_branch,filter_type:filter_type}
        },
        columns: [
           {
            data:'name',
            name:'name'
           },
           {
            data:'email',
            name:'email'
           },

           {
            data:'address',
            name:'address'
           },
           {
            data:'po_number',
            name:'po_number'
           },
           {
            data:'pb_header_id',
            name:'pb_header_id'
           },
           {
            data:'flag_sent',
            name:'flag_sent'
           },
           {
            data:'po_date',
            name:'po_date'
           },
           {
            data:'updated_at',
            name:'updated_at'
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
var filter_type =$('#filter_type').val();

if(filter_branch != '' && filter_branch != '')
{
$('#example2').DataTable().destroy();
fill_datatable(filter_branch,filter_type);

}
else {
alert('Isi Data Filter Dengan Lengkap');
}

});
$('#reset').click(function(){
$('#filter_branch').val('');
$('#filter_type').val('');
$('#example2').DataTable().destroy();
fill_datatable();
});
    });
</script>

@endsection
