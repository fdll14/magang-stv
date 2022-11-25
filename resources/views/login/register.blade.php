@extends('layouts.main')

@section('container')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">


            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>Silahkan Registrasi Akun Terlebih Dahulu!</h4><br>
              <h6 class="font-weight-light">Pastikan data yang kalian masukan sudah benar.</h6>
              <form class="pt-3" action="/register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="NIM">NIM/NIS</label>
                    <input type="text" class="form-control  @error('NIM') is-invalid @enderror" name="NIM" id="NIM" placeholder="NIM/NIS"  >
    
                    @error('NIM')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" class="form-control  @error('jurusan') is-invalid @enderror" name="jurusan" id="jurusan" placeholder="jurusan">
    
                    @error('jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="asal">Asal Sekolah/Kampus</label>
                    <input type="text" class="form-control @error('asal') is-invalid @enderror" name="asal" id="asal" placeholder="asal">
    
                    @error('asal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama Lengkap" >
    
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" >
    
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" >
    
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nohp">Nomor HP</label>
                    <input type="text" class="form-control  @error('nohp') is-invalid @enderror" name="nohp" id="nohp" placeholder="nohp" >
    
                    @error('nohp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
    
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                <div class="mt-3">
                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Daftar</button>
                </div>
                <div class="mb-2">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah punya akun? <a href="login" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

@endsection