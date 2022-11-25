@extends('layouts.main')

@section('container')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>Hello!</h4>
              <h6 class="font-weight-light">Selamat datang di sistem magang satelit tv.</h6>
              <form class="pt-3" action="/login" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" id="floatingUsername" placeholder="username" name="username" value="{{ old('username') }}" required>
                 
                  @error('username')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="floatingPassword" placeholder="Password" name="password" required>
                </div>
                <div class="mt-3">
                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">Login</button>
                </div>
                <div class="mb-2">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum punya akun? <a href="register" class="text-primary">Daftar</a>
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