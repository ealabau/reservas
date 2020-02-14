@extends('layouts.panel')

@section('content')

 <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo Paciente</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('patients') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
                </div>
              </div>
            </div>
           <div class="card-body">

            @if ($errors->any())
            
              <div class="alert alert-danger" role="alert">
                <ul>
                  @foreach ($errors->all() as $error)
                 <li><strong>Error!</strong> {{ $error }}</li>
                @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ url('patients') }}" method="post">
              @csrf
               <div class="form-group">
                <label for="name">Nombre Paciente</label>
                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
              </div>

               <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" >
              </div>

               <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" name="dni" value="{{ old('dni') }}">
              </div>

              <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
              </div>

              <div class="form-group">
                <label for="telefono">Télefono</label>
                <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
              </div>

              <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" class="form-control" name="password" value="{{ old('password',Str::random(6)) }}">
              </div>

              

              <button type="submit" class="btn btn-primary">Guardar</button>

            </form>

            </div>
          </div>
@endsection