@extends('layouts.panel')

@section('content')

 <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Nueva Especialidad</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('especialidades') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
            <form action="{{ url('especialidades') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="name">Nombre Especialidad</label>
                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
              </div>

               <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" class="form-control" name="description" >
              </div>

              <button type="submit" class="btn btn-primary">Guardar</button>

            </form>

            </div>
          </div>
@endsection
