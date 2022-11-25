@extends('dashboard.layouts.main')

@section('container')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Laporan</h4>
            <form class="forms-sample" action="{{ route('laporan.update', $row->id) }}" method="POST">
                @csrf
                @method('PUT')

              <div class="form-group">
                <label for="id">ID Laporan</label>
                <input type="text" class="form-control  @error('id') is-invalid @enderror" name="id" id="id" value="{{ old('id', $row->id) }}" readonly >

                @error('id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="laporan">Laporan Kegiatan</label>
                <input type="text" class="form-control  @error('laporan') is-invalid @enderror" name="laporan" id="laporan" value="{{ old('laporan', $row->laporan) }}" readonly >

                @error('laporan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="jurusan">Tanggal</label>
                <input type="text" class="form-control @error('tgl_laporan') is-invalid @enderror"
                name="tgl_laporan" value="{{ old('tgl_laporan', $row->tgl_laporan) }} " readonly>

            @error('tgl_laporan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control select2 @error('status') is-invalid @enderror" name="status"  value="{{ old('status', $row->status) }} ">
                    <option value="1">Disetujui</option>
                    <option value="0">Tidak Disetujui</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <a href="{{ route('laporan.index') }}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
