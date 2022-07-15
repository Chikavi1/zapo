@extends('layouts.app')
 
@section('content')
<div class="container">


@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>Hubo un error.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('suppliers/register') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card text-white bg-warning mb-3">
  <div class="card-header">Alerta</div>
  <div class="card-body">
    <p class="card-text">Puede que tarde unos días en que te contacten.</p>
  </div>
</div>
        @if($formulario)
        <h1>Crear Proveedor</h1>
        <div class="row mt-2">
            <div class="col-md-6 mt-4">
                <div class="form-group">
                    <label for="txtFirstName">Nombre de la empresa:</label>
                    <input type="text" class="form-control"  placeholder="Ingresa nombre" name="name">
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="form-group">
                    <label for="txtLastName">Razón social:</label>
                    <input type="text" class="form-control" placeholder="Ingresa Razón social" name="business_name">
                </div>
            </div>
        </div>
       
        <div class="form-group mt-4">
                <label for="txtLastName">Porcentaje de Retorno:</label>
                <input type="number" min="1" max="5" class="form-control" placeholder="Ingresa Porcentaje de Retorno" name="cashback"> 
        </div> 

        <div class="form-group mt-4">
                <label for="txtLastName">Foto</label>
                <input type="file" class="form-control" placeholder="Ingresa Foto" name="photo"> 
        </div> 
        
        <div class="form-group mt-4">
            <label for="txtAddress">Descripción de la empresa:</label>
            <textarea class="ckeditor"  name="description" rows="10" placeholder="Ingresa descripción"></textarea>
        </div>
        <button type="submit" class="btn btn-success my-4 btn-block">Crear</button>
        </form>

        @else
        <h3 class="text-center">Ya enviaste una solicitud</h3>
        <div class="text-center">
            @if($supplier->estatus == 0)
            <h5 style="color:orange;">Pendiente</h5>
            @endif
            @if($supplier->estatus == 1)
            <h5 style="color:green;">Aprobada</h5>
            @endif
            @if($supplier->estatus == 2)
            <h5 style="color:red;">Rechazada</h5>
            @endif
        </div>
        <div class="card">
            <h5>Tus datos</h5>
            <p><b>Nombre:</b> {{ $supplier->name }}</p>
            <!-- <p><b>Razón social:</b>  {{ $supplier->bussiness_name }}</p> -->
            <p><b>Porcentaje de Retorno:</b>  {{ $supplier->cashback }}</p>
            <p><b>Descripción:</b>  {{ $supplier->description }}</p>
            <p><b>Enviado el:</b>  {{ date('d/m/Y ',strtotime($supplier->created_at)) }}</p>
        </div>
        @endif
</div>
@endsection
