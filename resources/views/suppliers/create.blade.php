@extends('layouts.app')
 
@section('content')
<h1>Crear Proveedor</h1>

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>Hubo un erro.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('suppliers/store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtFirstName">Nombre:</label>
                    <input type="text" class="form-control"  placeholder="Ingresa nombre" name="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtLastName">Razón social:</label>
                    <input type="text" class="form-control" placeholder="Ingresa Razón social" name="business_name">
                </div>
            </div>
        </div>
       
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="txtLastName">Nombre representate legal:</label>
                <input type="text" class="form-control" placeholder="Ingresa nombre representate legal" name="representative_name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="txtLastName">Teléfono:</label>
                <input type="phone" class="form-control" placeholder="Ingresa teléfono" name="phone">
            </div>
          </div>
      </div>
       
       
        <div class="form-group">
                <label for="txtLastName">Porcentaje de retorno:</label>
                <input type="number" min="1" max="5" class="form-control" placeholder="Ingresa porcentaje de retorno" name="cashback"> 
        </div> 
       
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtLastName">Correo electrónico:</label>
                    <input type="email" class="form-control" placeholder="Ingresa correo electrónico" name="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtLastName">Contraseña:</label>
                    <input type="password" class="form-control" placeholder="Ingresa contraseña" name="password">
                </div>
            </div>
        </div>
       
        
        <div class="form-group">
            <label for="txtAddress">Descripción:</label>
            <textarea class="ckeditor"  name="description" rows="10" placeholder="Ingresa descripción"></textarea>
        </div>
        <button type="submit" class="btn btn-success my-4 btn-block">Crear</button>
    </form>
@endsection
