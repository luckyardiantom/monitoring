@extends('layouts.master')
@section('content')



<div class="card">
    <div class="card-header">
      <h2 class="card-title">Halaman Data Tarikan Master Produk TMI</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
<div class="form-group">
    <select class="btn btn-light dropdown-toggle" id="filter_branch" name="filter_branch">
        <option value="">Pilih Cabang</option>
        @foreach ($cabang as $cb)
        <option value="{{ $cb->name  }}">{{ $cb->name }}</option>
        @endforeach
        </select>

        <select class="btn btn-light dropdown-toggle" id="filter_type" name="filter_type">
            <option value="">Pilih Tipe</option>
            @foreach ($tipe as $cb)
            <option value="{{ $cb->description}}">{{ $cb->description}}</option>
            @endforeach
            </select>

            <input type="date" id="from_date" name="from_date">
            <input type="date" id="to_date" name="to_date">

        <button type="text" name="filter" id="filter" class="btn btn-secondary">Submit</button>
        <button type="text" name="reset" id="reset" class="btn btn-primary">Reset</button>

    </div>


<div class="table-responsive">

    <table class="table table-striped"  id="example2" width="100%" cellspacing="0">
        <thead>
              <tr>
              <th>Nama Cabang </th>
              <th>Kode Cabang</th>
              <th>Kode TMI</th>
              <th>Nama Tipe TMI</th>
              <th>Status</th>
              <th>Tanggal</th>
              </tr>
            </thead>
          </table>
        </div>
        <br>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script>
    $(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });
</script>
<script>
    $(document).ready(function(){

        fill_datatable();
function fill_datatable(filter_branch= '',filter_type='',from_date = '', to_date = ''){
    var dataTable = $('#example2').DataTable({
        processing : true,
        serverSide : true,
        ajax:{
            url: "{{ route('prodmast.index') }}",
            data:{filter_branch:filter_branch,filter_type:filter_type,from_date:from_date, to_date:to_date}
        },
        columns: [
           {
            data:'name',
            name:'name'
           },
           {
            data:'code',
            name:'code'
           },
           {
            data:'cd',
            name:'cd'
           },
           {
            data:'description',
            name:'description'
           },
           {
            data:'status',
            name:'status'
           },
           {
            data:'date',
            name:'date'
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
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();

if(filter_branch != '' && filter_branch != '' && from_date != '' &&  to_date != '')
{
$('#example2').DataTable().destroy();
fill_datatable(filter_branch,filter_type,from_date, to_date);

}
else {
alert('Isi Data Filter Dengan Lengkap');
}

});
$('#reset').click(function(){
$('#filter_branch').val('');
$('#filter_type').val('');
$('#from_date').val('');
  $('#to_date').val('');
$('#example2').DataTable().destroy();
fill_datatable();
});
    });
</script>

@endsection
