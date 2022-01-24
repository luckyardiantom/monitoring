@extends('layouts.master')
@section('content')



<div class="card">
    <div class="card-header">
        <h2 class="card-title">Halaman Data Bukti Terima Barang (BTB)</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="form-group">
            <label >Pilih Toko</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <select class="js-example-disabled-results" id="filter_branch" name="filter_branch" >
        <option value=""></option>
        @foreach ($toko as $cb)
        <option value="{{ $cb->store_name}}">{{ $cb->store_name}}</option>
        @endforeach
        </select>

        <br>

        <label >Pilih Cabang</label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select class="js-example-disabled-results" id="filter_branches" name="filter_branches">
            <option value=""></option>
            @foreach ($cabang as $cb)
            <option value="{{ $cb->name }}">{{ $cb->name }}</option>
            @endforeach
            </select>
            <br>

<label >Mulai</label>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="date" id="from_date" name="from_date">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label > s/d</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="date" id="to_date" name="to_date">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <button type="text" name="filter" id="filter" class="btn btn-primary btn-sm">Submit</button>
        <button type="text" name="reset" id="reset" class="btn btn-secondary btn-sm">Reset</button>

        {{-- <a href="/log" class="btn btn-success btn-sm"  target="_blank"  tabindex="-1" role="button" aria-disabled="true">Log </a> --}}

        <br>
<div class="table-responsive">

        <table class="table table-striped" id="example2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nomor Transaksi </th>
                <th>Station</th>
                <th>Kasir  </th>
                <th>Nama Toko</th>
                <th>Kode Member</th>
                <th>Cabang</th>
                <th>Waktu Transaksi</th>
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
function fill_datatable(filter_branch= '',filter_branches = '',from_date = '', to_date = ''){
    var dataTable = $('#example2').DataTable({
        processing : true,
        serverSide : true,
        ajax:{
            url: "{{ route('transaksi.index') }}",
            data:{filter_branch:filter_branch,filter_branches:filter_branches,from_date:from_date, to_date:to_date}
        },
        columns: [

{
 data:'trx_no',
 name:'trx_no'
},
{
 data:'station',
 name:'station'
},
{
 data:'cashier',
 name:'cashier'
},
{
 data:'store_name',
 name:'store_name'
},
{
 data:'member_code',
 name:'member_code'
},
{
 data:'name',
 name:'name'
},
{
 data:'trx_date',
 name:'trx_date'
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
var filter_branches = $('#filter_branches').val();
var from_date = $('#from_date').val();
var to_date = $('#to_date').val();

if(filter_branch != '' && filter_branch != '' && filter_branches != '' && from_date != '' &&  to_date != '')
{
$('#example2').DataTable().destroy();
fill_datatable(filter_branch,filter_branches,from_date, to_date);

}
else {
    alert('Isi Data Filter Dengan Lengkap');
}

});
$('#reset').click(function(){
$('#filter_branch').val('');
$('#filter_branches').val('');
$('#from_date').val('');
  $('#to_date').val('');
$('#example2').DataTable().destroy();
fill_datatable();
});
    });
</script>


@endsection
