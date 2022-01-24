
@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
      <h2 class="card-title">Halaman Maping Status Produk TMI</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
                    $('#example2').DataTable();
                } );
        </script>


<form action="{{'filtercabang'}}" method="POST">
    @csrf
<select class="js-example-disabled-results" id="name" name="name">
    <option value="">Pilih Cabang</option>
@foreach ($cabang as $name)
<option value="{{ $name->name  }}">{{ $name->name }}</option>
@endforeach
</select>

<select class="btn btn-light dropdown-toggle" id="description" name="description">
    <option value="">Pilih Tipe</option>
    @foreach ($tipe as $cb)
    <option value="{{ $cb->description }}">{{ $cb->description }}</option>
    @endforeach
    </select>

    <select class="btn btn-light dropdown-toggle" id="status" name="status">
        <option value="">Pilih Status</option>
        @foreach ($status as $cb)
        <option value="{{ $cb->status }}">{{ $cb->status }}</option>
        @endforeach
        </select>

<button type="text" id="btnFiterSubmitSearch" class="btn btn-primary btn-sm">Submit</button>


</form>
</div>

<div class="table-responsive">
    <table class="table table-striped"  id="example2" width="100%" cellspacing="0">
        <thead>
          <tr>
              <th>Cabang Indogrosir</th>
              <th>Tipe TMI</th>
              <th>Deskripsi</th>
              <th>Kode PLU </th>
              <th>Status</th>
              <th>Aksi</th>
              </tr>
            </thead>

                @foreach($nilai as $data)
                  <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->description}}</td>
              <td>{{$data->desc}}</td>
              <td>{{$data->plu}}</td>
              <td>{{$data->status}}</td>
              <td>

                <form class="" action="{{ url('/maping/delete/'.$data->id) }}" method="post">
                    @csrf
                    <a href="{{ url('/maping/edit/'.$data->id) }}" class="btn btn-secondary btn-sm" > <i class="nav-icon fas fa-pen"></i></a>
                </form>
              </td>
    </tr>
      @endforeach
          </table>


        </div>



@endsection
