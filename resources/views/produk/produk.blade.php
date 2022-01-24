@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
      <h2 class="card-title">Halaman Data Produk CMS</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <div class="form-group">
            <select class="btn btn-light dropdown-toggle" id="filter_branch" name="filter_branch">
                <option value="">Pilih Cabang</option>
                @foreach ($cabang as $cb)
                <option value="{{ $cb->name }}">{{ $cb->name }}</option>
                @endforeach
                </select>

                <select class="btn btn-light dropdown-toggle" id="filter_type" name="filter_type">
                    <option value="">Pilih Tipe</option>
                  {{-- <option value="%">Semua Tipe TMI</option> --}}
                    @foreach ($tipe as $cb)
                    <option value="{{ $cb->nama  }}">{{ $cb->nama     }}</option>
                    @endforeach
                    </select>

                <button type="text" name="filter" id="filter" class="btn btn-secondary">Submit</button>
                <button type="text" name="reset" id="reset" class="btn btn-primary">Reset</button>
        </div>

<div class="table-responsive">

        <table class="table table-striped"  id="example2" width="100%" cellspacing="0">
            <thead>
              <tr>
              <th>Nama Produk CMS </th>
              <th>Kode PLU</th>
              <th>Kode Cabang</th>
              <th>Nama Cabang</th>
              <th>Tipe TMI</th>
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
            url: "{{ route('produk.index') }}",
            data:{filter_branch:filter_branch,filter_type:filter_type}
        },
        columns: [
           {
            data:'long_desc',
            name:'long_desc'
           },
           {
            data:'kodeplu',
            name:'kodeplu'
           },
           {
            data:'kode_igr',
            name:'kode_igr'
           },
           {
            data:'name',
            name:'name'
           },
           {
            data:'nama',
            name:'nama'
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
