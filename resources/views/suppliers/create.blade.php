@extends('layouts.app')
 
@section('content')
<h1>Crear</h1>

@if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                    <label for="txtLastName">Razòn social:</label>
                    <input type="text" class="form-control" placeholder="Ingresa Razòn social" name="business_name">
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
                <label for="txtLastName">Telèfono:</label>
                <input type="phone" class="form-control" placeholder="Ingresa telèfono" name="phone">
            </div>
          </div>
      </div>
       
       
        <div class="form-group">
                <label for="txtLastName">Cashback:</label>
                <input type="number" class="form-control" placeholder="Ingresa cashback" name="cashback"> 
        </div> 
       
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtLastName">Correo electronico:</label>
                    <input type="email" class="form-control" placeholder="Ingresa correo electronico" name="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtLastName">Contraseña:</label>
                    <input type="text" class="form-control" placeholder="Ingresa contraseña" name="password">
                </div>
            </div>
        </div>
       
        
        <div class="form-group">
            <label for="txtAddress">Descripciòn:</label>
            <textarea class="form-control"  name="description" rows="10" placeholder="Ingresa descripciòn"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Crear</button>
    </form>
@endsection
