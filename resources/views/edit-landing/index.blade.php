@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

    <h3 class="text-center">Editar Página Principal</h3>

    <form class="container" action="{{ url('edit-landing/store') }}" method="POST" enctype="multipart/form-data">

    @method('PATCH')    
        @csrf

    <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtFirstName">Titulo</label>
                    <input type="text" class="form-control" value="{{$config->title}}" placeholder="Ingresa Titulo" name="title" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtFirstName">Subtitulo</label>
                    <input type="text" value="{{$config->subtitle}}" class="form-control"  placeholder="Ingresa subtitulo" name="subtitle" required>
                </div>
            </div>
    </div>
       
    <div class="row mt-4">
        <div class="col-md-4">
                <div class="form-group">
                    <label for="txtFirstName">Imagen 1</label>
                    <input type="file" value="{{$config->image1}}" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control"  placeholder="Ingresa imagen" name="image1">
                </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                    <label for="txtFirstName">Imagen 2</label>
                    <input type="file" value="{{$config->image2}}" oninput="pic2.src=window.URL.createObjectURL(this.files[0])" class="form-control"  placeholder="Ingresa imagen" name="image2">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                    <label for="txtFirstName">Imagen 3</label>
                    <input type="file" value="{{$config->image3}}"  oninput="pic3.src=window.URL.createObjectURL(this.files[0])" class="form-control"  placeholder="Ingresa imagen" name="image3">
            </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <img id="pic" style="max-height:13em;min-height:13em;object-fit: cover;" src="{{ URL::asset('public/photos/'.$config->image1) }}" alt="imagen 1">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img id="pic2" style="max-height:13em;min-height:13em;object-fit: cover;" src="{{ URL::asset('public/photos/'.$config->image2) }}" alt="imagen 2">
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img id="pic3" style="max-height:13em;min-height:13em;object-fit: cover;" src="{{ URL::asset('public/photos/'.$config->image3) }}" alt="imagen 3">
            </div>
    </div>
    <button type="submit" class="btn btn-success my-4 btn-block">Guardar</button>
    </form>
</div>
@endsection