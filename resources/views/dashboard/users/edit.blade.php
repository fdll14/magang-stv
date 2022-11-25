@extends('dashboard.layouts.main')

@section('container')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Data</h4>
            <form class="forms-sample" action="{{ route('users.update', Crypt::encryptString($row->id)) }}" method="POST">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label for="NIM">NIM/NIS</label>
                <input type="text" class="form-control  @error('NIM') is-invalid @enderror" name="NIM" id="NIM" placeholder="NIM/NIS" value="{{ old('NIM', $row->NIM) }}" >

                @error('NIM')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="text" class="form-control  @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" placeholder="jurusan" value="{{ old('jurusan', $row->jurusan) }}">

                @error('jurusan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="asal">Asal Sekolah/Kampus</label>
                <input type="text" class="form-control @error('asal') is-invalid @enderror" name="asal" id="asal" placeholder="asal" value="{{ old('asal', $row->asal) }}">

                @error('asal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Lengkap" value="{{ old('name', $row->name) }}" >

                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" value="{{ old('username', $row->username) }}">

                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" value="{{ old('email', $row->email) }}">

                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="nohp">Nomor HP</label>
                <input type="text" class="form-control  @error('nohp') is-invalid @enderror" name="nohp" id="nohp" placeholder="nohp" value="{{ old('nohp', $row->nohp  ) }}">

                @error('nohp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="txt" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" value="">

                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
