@extends('layouts.panel')

@section('content')

 <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nuevo Doctor</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('doctors') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
            <form action="{{ url('doctors') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="name">Nombre Doctor</label>
                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
              </div>

               <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" >
              </div>

               <div class="form-group">
                <label for="dni">DNI</label>
                <input type="text" class="form-control" name="dni" >
              </div>

              <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" name="direccion" >
              </div>

              <div class="form-group">
                <label for="telefono">Télefono</label>
                <input type="text" class="form-control" name="telefono" >
              </div>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </form>

            </div>
          </div>
@endsection
