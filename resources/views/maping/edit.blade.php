@extends('layouts.master')
@section('content')

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header bg-secondary text-white py-2">
      Edit Data Status Maping Produk
    </div>
    <div class="card-body">
        
      <form action="{{ url('/maping/edit/'.$nilai->id.'/proses') }}" method="post">
        @csrf

        <div class="form-group">
          <label>Status</label>
           <select class="form-control @error('status_product_master_id') is-invalid @enderror" name="status_product_master_id">
            <option value="">Pilih Status</option>
            <option value="1" {{ $nilai->status_product_master_id == '1' ? 'selected' : '' }}>Wajib</option>
            <option value="2" {{ $nilai->status_product_master_id == '2' ? 'selected' : '' }}>Saran</option>
            <option value="3" {{ $nilai->status_product_master_id == '3' ? 'selected' : '' }}>Arsip</option>
          </select>
          @error('status_product_master_id')
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
