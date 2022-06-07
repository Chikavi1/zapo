@extends('layouts.app')
 
@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12">
    <a class="btn btn-primary" href="{{ url('dispatcher') }}">Regresar</a>

<h1>Crear Despachador</h1>
<p>Solo se pueden agregar si no existe el número.</p>
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
    
    <form method="POST" action="{{ route('dispatcher.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtFirstName">Nombre</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" placeholder="Ingresa nombre" name="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtFirstName">Correo</label>
                    <input type="email" value="{{ old('email') }}" class="form-control"  placeholder="Ingresa correo" name="email">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="txtFirstName">Teléfono</label>
                    <input type="phone" class="form-control" value="{{ old('cellphone') }}" placeholder="Ingresa teléfono" name="cellphone">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="txtFirstName">Contraseña</label>
                    <input type="password" value="{{ old('password') }}" class="form-control"  placeholder="Ingresa contraseña" name="password">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="txtFirstName">Contraseña</label>
                    <input type="password" value="{{ old('password-confirm') }}" class="form-control"  placeholder="Confirmar contraseña" name="password-confirm">
                </div>
            </div>
        </div>
       
        
       

      
        <button type="submit" class="btn btn-success my-4 btn-block">Crear</button>
    </form>
    </div>
</div>
@endsection
