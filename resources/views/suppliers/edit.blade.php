@extends('layouts.app')
 
@section('content')
<h1>Editar</h1>

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
    <form action="{{ url('suppliers/update') }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtFirstName">Nombre:</label>
                    <input type="text" class="form-control" value="{{ $supplier->name }}" placeholder="Ingresa nombre" name="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtLastName">Razòn social:</label>
                    <input type="text" class="form-control" placeholder="Ingresa Razòn social" value="{{ $supplier->business_name }}"  name="business_name">
                </div>
            </div>
        </div>
       
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="txtLastName">Nombre representate legal:</label>
                <input type="text" class="form-control" placeholder="Ingresa nombre representate legal"  value="{{ $supplier->representative_name }}" name="representative_name">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label for="txtLastName">Telèfono:</label>
                <input type="phone" class="form-control" placeholder="Ingresa telèfono" value="{{ $supplier->phone }}"  name="phone">
            </div>
          </div>
      </div>
       
       
        <div class="form-group">
                <label for="txtLastName">Cashback:</label>
                <input type="number" class="form-control" placeholder="Ingresa cashback" value="{{ $supplier->cashback }}" name="cashback"> 
        </div> 
       
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtLastName">Correo electronico:</label>
                    <input type="email" class="form-control" disabled="true" placeholder="Ingresa correo electronico" value="{{ $supplier->email }}" name="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtLastName">Contraseña:</label>
                    <input type="text" class="form-control" placeholder="Ingresa contraseña" value="{{ $supplier->password }}" name="password">
                </div>
            </div>
        </div>
        <input type="hidden" class="form-control"  value="{{ $supplier->id }}" name="id">

        
        <div class="form-group">
            <label for="txtAddress">Descripciòn:</label>
            <textarea class="form-control"  name="description" rows="10"  placeholder="Ingresa descripciòn">{{ $supplier->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-default">Editar</button>
    </form>
@endsection
