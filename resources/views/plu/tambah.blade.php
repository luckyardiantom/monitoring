@extends('layouts.master')
@section('content')

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header bg-secondary text-white py-2">
      Update Data Tipe Produk
    </div>



    <div class="card-body">
      <form action="{{ url('/plu/tambah/'.$nilai->id.'/proses') }}" method="post">
        @csrf
      @if(session('errors'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Something it's wrong:
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif


        <div class="form-group">
            <label>Cabang</label>
            <input name="kode_igr" type="text" class="form-control @error('kode_igr') is-invalid @enderror" value="{{ $nilai->kode_igr }} "readonly>
            @error('kode_igr')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Kode PLU</label>
            <input name="kodeplu" type="text" class="form-control @error('kodeplu') is-invalid @enderror" value="{{ $nilai->kodeplu }}"readonly>
            @error('kodeplu')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>


          <div class="form-group">
            <label>Harga Jual</label>
            <input name="hrg_jual" type="text" class="form-control @error('hrg_jual') is-invalid @enderror" value="{{ $nilai->hrg_jual }}" readonly>
            @error('hrg_jual')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

        <div class="form-group">
            <label>Kode Margin</label>
            <input name="mrg_id" type="text" class="form-control @error('mrg_id') is-invalid @enderror" value="{{ $nilai->mrg_id }}">
            @error('mrg_id')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

        <div class="form-group">
          <button type="submit" name="simpan" class="btn btn-secondary">Simpan</button>

        </div>
      </form>
    </div>
  </div>
</div>

@endsection
