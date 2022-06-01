@extends('layouts.app')
 
@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2 col-sm-12">
          
<h1>Crear Regalo</h1>

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
    <form action="{{ url('rewards/store') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="txtFirstName">Valor puntos</label>
                    <input type="number" value="{{ old('points') }}" class="form-control"  placeholder="Ingresa cantidad de puntos necesarios" name="points">
                </div>
            </div>
        </div>
       
        
        <div class="form-group mt-1">
            <label for="txtAddress">Descripción</label>
            
            <textarea class="ckeditor" value="{{ old('description') }}"  name="description" id="editor1" rows="10" cols="80" placeholder="Ingresa descripción">
            </textarea>
        </div>

        <div class="form-group">
            <label for="txtAddress">Condiciones</label>
            <textarea class="ckeditor" value="{{ old('conditions') }}" name="conditions" rows="10" placeholder="Ingresa Condiciones"></textarea>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="txtFirstName">Fotos</label>
                    <input class="form-control" type="file" name="photos" placeholder="Selecciona imagen" id="image">
                    <!-- <input type="text" class="form-control"  placeholder="Ingresa foto" name="photos"> -->
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success my-4 btn-block">Crear</button>
    </form>
    </div>
</div>
@endsection
