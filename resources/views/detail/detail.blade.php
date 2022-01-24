@extends('layouts.master')
@section('content')

<h3 style="text-align: left" class="m-0 font-weight-bold text-primary">Detail Data BTB </h3>
<br>

<ul class="col-7 py-3"   >

    <table class="table table-striped table-hover">
        @foreach($nilai as $data)
        <tr>
          <th scope="row">Nomor Transaksi</th>
          <td>{{$data->trx_no}}</td>
        </tr>

        <tr>
          <th scope="row">Station</th>
          <td>{{$data->station}}</td>
        </tr>

        <tr>
          <th scope="row">Kasir</th>
          <td>{{$data->cashier}}</td>
        </tr>

        <tr>
          <th scope="row"> Tanggal Transaksi</th>
          <td>{{$data->trx_date}}</td>
        </tr>

        <tr>
          <th scope="row">Nama Toko</th>
          <td>{{$data->store_name}}</td>
        </tr>

        <tr>
          <th scope="row">Kode Member</th>
          <td>{{$data->member_code}}</td>
        </tr>

        @endforeach
    </table>

</ul>

@endsection
