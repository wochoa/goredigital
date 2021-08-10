@extends('layouts.logintm')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email / Username') }}</label>

                            <div class="col-md-6">
                                <input input id="login" type="text" class="form-control {{ $errors->has('username')|| $errors->has('email') ? 'is-invalid':''}}" name="login" value="{{ old('username')?:old('email') }}" required  autofocus placeholder="Usuario/email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
 <!-- /.login-logo -->
 <div class="card card-outline card-primary" style="background: #fdfdfd2e !important">{{--  background: url(dist/img/banner-desarrollo-limpio.jpg) no-repeat center center fixed; --}}
  <div class="card-header text-center p-0">
    {{-- <a href="../../index2.html" class="h1 text-white"><b>Held</b>DESK</a> --}}
    <img src="dist/img/banner-desarrollo-limpio.jpg" alt="" class="img-fluid">
  </div>
  <div class="card-body">
    <p class="login-box-msg text-white"">Iniciar session</p>

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="input-group mb-3">
        {{--<input type="email" class="form-control" placeholder="Email"> --}}
        <input  id="adm_email" type="text" class="form-control {{ $errors->has('adm_email')|| $errors->has('adm_email') ? 'is-invalid':''}}" name="adm_email" value="{{ old('adm_email')?:old('adm_email') }}" required  autofocus placeholder="Usuario" onkeyup="javascript:this.value=this.value.toUpperCase();"  style=" background: rgba(0, 0, 0, 0.3);border: none;outline: none; color:rgb(81 218 248)">    {{-- onkeyup="javascript:this.value=this.value.toUpperCase();"  --}}
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope" ></span>
          </div>
        </div>
          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="input-group mb-3">
        {{-- <input type="password" class="form-control" placeholder="Password"> --}}
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" style=" background: rgba(0, 0, 0, 0.3);border: none;outline: none;color:rgb(81 218 248)">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            {{-- <input type="checkbox" id="remember"> --}}
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="text-white">
              Recordarme
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block btn-sm">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    {{-- <div class="social-auth-links text-center mt-2 mb-3">
      <a href="#" class="btn btn-block btn-primary">
        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
      </a>
      <a href="#" class="btn btn-block btn-danger">
        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
      </a>
    </div> --}}
    <!-- /.social-auth-links -->

    <p class="mb-1">
      {{-- <a href="forgot-password.html">I forgot my password</a> --}}
      @if (Route::has('password.request'))
                                  <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                      {{ __('¿Olvidaste tu contraseña?') }}
                                  </a>
                              @endif
    </p>
    {{-- <p class="mb-0">
      <a href="register.html" class="text-center">Register a new membership</a>
    </p> --}}
  </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection
