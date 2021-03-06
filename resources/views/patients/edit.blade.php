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
            <form action="{{ url('patients/'.$patient->id) }}" method="post">
              @csrf
                 @method('PUT')
              <div class="form-group">
                <label for="name">Nombre Paciente</label>
                <input type="text" class="form-control" name="name" required value="{{ old('name',$patient->name) }}">
              </div>

               <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{ old('email',$patient->email) }}" >
              </div>

               <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" name="dni" value="{{ old('dni',$patient->dni) }}">
              </div>

              <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion',$patient->direccion) }}">
              </div>

              <div class="form-group">
                <label for="telefono">Télefono</label>
                <input type="text" class="form-control" name="telefono" value="{{ old('telefono',$patient->telefono) }}">
              </div>

              <div class="form-group">
                <label for="password">Contraseña </label>
                <input type="text" class="form-control" name="password" value="">
                <p>(Ingrese un valor sólo si desea modificar la contraseña)</p>
              </div>

              

              <button type="submit" class="btn btn-primary">Guardar</button>

            </form>

            </div>
          </div>
@endsection
