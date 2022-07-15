@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Cambiar Datos</h2>
    <div class="card">
        <form action="{{ url('update-profile') }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')    
            @csrf
            
            <div class="form-group">
                <label for="txtFirstName">Nombre</label>
                <input type="text" class="form-control" value="{{ $user->name }}" placeholder="Ingresa nombre" name="name">
            </div>
            <div class="form-group mt-4">
                <label for="txtFirstName">Celular</label>
                <input type="number" class="form-control" value="{{ $user->cellphone }}" placeholder="Ingresa celular" name="cellphone">
            </div>
            <button type="submit" class="btn btn-success mt-4 btn-block">Editar</button>
        </form>
    </div>

    @if($user->type==2)
    <form action="">
    <div class="form-group mt-4">
        <img src="" alt="">
        <p>Imagen Actual</p>
        <label for="txtFirstName">Cambiar imagen</label>
        <input type="file" class="form-control"  name="photo">
    </div>
    </form>
    @endif
    <div>

    </div>
</div>
    @endsection