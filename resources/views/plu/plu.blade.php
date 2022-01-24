@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Halaman Maping Tipe PLU</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
                    $('#example2').DataTable();
                } );
        </script>


<form action="{{'filtercabang1'}}" method="POST">
    @csrf
<select class="btn btn-light dropdown-toggle" id="name" name="name">
    <option value="">Pilih Cabang</option>
@foreach ($cabang as $name)
<option value="{{ $name->name  }}">{{ $name->name }}</option>
@endforeach
</select>

<button type="text" id="btnFiterSubmitSearch" class="btn btn-primary btn-sm">Submit</button>


</form>
</div>

<div class="table-responsive">
    <table class="table table-striped"  id="example2" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nama Cabang </th>
            <th>Kode Margin</th>
            <th>Kode PLU</th>
            <th>Deskripsi</th>
              <th>Aksi</th>
              </tr>
            </thead>

                @foreach($nilai as $data)
                  <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->mrg_id}}</td>
              <td>{{$data->prdcd}}</td>
              <td>{{$data->long_description}}</td>
              <td>

                <form class="" action="{{ url('/plu/delete/'.$data->id) }}" method="post">
                    @csrf
                    <a href="{{ url('/plu/edit/'.$data->id) }}" class="btn btn-secondary btn-sm" > <i class="nav-icon fas fa-pen"></i></a>
                </form>
              </td>
    </tr>
      @endforeach
          </table>


        </div>



@endsection
