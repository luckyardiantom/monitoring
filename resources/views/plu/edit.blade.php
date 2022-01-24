@extends('layouts.master')
@section('content')

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header bg-secondary text-white py-2">
      Edit Data Status Maping PLU
    </div>
    <div class="card-body">
      <form action="{{ url('/plu/edit/'.$nilai->id.'/proses') }}" method="post">
        @csrf

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
