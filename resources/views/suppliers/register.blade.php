@extends('layouts.app')
 
@section('content')

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
    <form action="{{ url('suppliers/register') }}" method="POST">
        @csrf

        <div class="card text-white bg-warning mb-3">
  <div class="card-header">Alerta</div>
  <div class="card-body">
    <p class="card-text">Puede que tarde unos días en que te contacten.</p>
  </div>
</div>
<h1>Crear Proveedor</h1>

        <div class="row mt-2">
            <div class="col-md-6 mt-4">
                <div class="form-group">
                    <label for="txtFirstName">Nombre:</label>
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
                <label for="txtLastName">Cashback:</label>
                <input type="number" min="1" max="5" class="form-control" placeholder="Ingresa cashback" name="cashback"> 
        </div> 
        
        <div class="form-group mt-4">
            <label for="txtAddress">Descripción:</label>
            <textarea class="ckeditor"  name="description" rows="10" placeholder="Ingresa descripción"></textarea>
        </div>
        <button type="submit" class="btn btn-success my-4 btn-block">Crear</button>
    </form>
@endsection
