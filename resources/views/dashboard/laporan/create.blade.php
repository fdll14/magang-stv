@extends('dashboard.layouts.main')

@section('container')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Laporan</h4>
            <form class="forms-sample" action="{{ route('laporan.store') }}" method="POST">
                @csrf

              <div class="form-group">
                <label for="laporan">Kegiatan</label>
                <input type="text" class="form-control  @error('laporan') is-invalid @enderror" name="laporan" id="laporan" placeholder="Isi Kegiatan"  >

                @error('laporan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="jurusan">Tanggal</label>
                <input type="date" class="form-control @error('tgl_laporan') is-invalid @enderror"
                name="tgl_laporan">

            @error('tgl_laporan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
              </div>
              <button type="submit" class="btn btn-primary mr-2">Create</button>
              <a href="{{ route('laporan.index') }}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
