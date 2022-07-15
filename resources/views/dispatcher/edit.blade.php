@extends('layouts.app')
 
@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12">
    <a class="btn btn-primary" href="{{ url('dispatcher') }}">
        Regresar
    </a>

<h1>Crear Despachador</h1>

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Lo sentimos!</strong> Hay algunos errores, por favor, verifica estos campos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
    
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

    <form action="{{ url('dispatcher/update') }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')    
        @csrf

    <div class="form-group">
        <label for="txtFirstName">Nombre</label>
        <input type="text" class="form-control" value="{{ $dispatcher->name }}" placeholder="Ingresa nombre" name="name">
    </div>
    <div class="form-group mt-4">
        <label for="txtFirstName">Correo electrónico</label>
        <input type="email" class="form-control" value="{{ $dispatcher->email }}" placeholder="Ingresa correo" name="email">
    </div>
    <div class="form-group mt-4">
        <label for="txtFirstName">Celular</label>
        <input type="number" class="form-control" value="{{ $dispatcher->cellphone }}" placeholder="Ingresa celular" name="cellphone">
    </div>
    <input type="hidden" value="{{ Hashids::encode($dispatcher->id) }}"  name="id">

    <button type="submit" class="btn btn-success mt-4 btn-block">Editar</button>
</form>
    </div>
</div>

@endsection