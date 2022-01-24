@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
      <h2 class="card-title">Daftar Master Margin</h2>
    </div>
    <div class="card-body">

        <div class="form-group">
            <select class="btn btn-light dropdown-toggle" id="filter_branch" name="filter_branch">
                <option value="">Pilih Cabang</option>
                @foreach ($cabang as $cb)
                <option value="{{ $cb->kode_igr }}">{{ $cb->kode_igr }}</option>
                @endforeach
                </select>

                <select class="btn btn-light dropdown-toggle" id="filter_type" name="filter_type">
                    <option value="">Pilih Tipe</option>
                     @foreach ($tmi as $cb)
                    <option value="{{ $cb->kode_tmi  }}">{{ $cb->kode_tmi     }}</option>
                    @endforeach
                    </select>

                <button type="text" name="filter" id="filter" class="btn btn-secondary">Submit</button>
                <button type="text" name="reset" id="reset" class="btn btn-primary">Reset</button>
        </div>

<div class="table-responsive">

        <table class="table table-striped"  id="example2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Tipe TMI</th>
                <th>Cabang</th>
                <th>Kategori</th>
                <th>Min (%)</th>
                <th>Saran (%)</th>
                <th>Max (%)</th>
                <th>Department</th>
                <th>Divisi</th>
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
            url: "{{ route('margin.index') }}",
            data:{filter_branch:filter_branch,filter_type:filter_type}
        },
        columns: [
            {
            data:'kode_tmi',
            name:'kode_tmi'
           },
           {
            data:'kode_igr',
            name:'kode_igr'
           },
           {
            data:'KAT_NAMAKATEGORI',
            name:'KAT_NAMAKATEGORI'
           },
           {
            data:'margin_min',
            name:'margin_min'
           },
           {
            data:'margin_saran',
            name:'margin_saran'
           },
           {
            data:'margin_max',
            name:'margin_max'
           },
           {
            data:'DEP_NAMADEPARTEMENT',
            name:'DEP_NAMADEPARTEMENT'
           },
           {
            data:'DIV_NAMADIVISI',
            name:'DIV_NAMADIVISI'
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
