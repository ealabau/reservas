@extends('layouts.form')

@section('content')
<div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
           
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Ingreso al Sistema</small>
              </div>
              @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                <strong>Error!</strong> {{ $errors->first()}}
              </div>
              @endif 
              <form method="POST" action="{{ route('login') }}" role="form" >
                 @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control " placeholder="Email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  </div>
                </div>
                <div class="form-group @error('password') has-danger @enderror">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input  name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password"  required autocomplete="current-password">
                              </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="remember" name="remember" type="checkbox"  {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="remember">
                    <span class="text-muted">Recordar</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Ingresar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="{{ route('password.request') }}" class="text-light"><small>¿Olvidaste tu constraseña?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="/register" class="text-light"><small>Crear un nuevo usuario</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
