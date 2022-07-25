@extends('layouts.app')
 
@section('content')
<div class="container">
    <a class="btn btn-primary" href="{{ url('suppliers') }}"> Regresar</a>
    <h1>Editar</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Hay algunos errores en los campos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form  action="{{ url('suppliers/update') }}" method="POST">
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
                    <label for="txtLastName">Razón social:</label>
                    <input type="text" class="form-control" placeholder="Ingresa Razón social" value="{{ $supplier->business_name }}"  name="business_name">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="txtLastName">Porcentaje de retorno:</label>
            <input type="number" class="form-control" placeholder="Ingresa porcentaje de retorno" value="{{ $supplier->cashback }}" name="cashback"> 
        </div> 
        <input type="hidden" class="form-control"  value="{{ $supplier->id }}" name="id">       
        <div class="form-group">
            <label for="txtAddress">Descripción:</label>
            <textarea class="form-control"  name="description" rows="10"  placeholder="Ingresa descripción">{{ $supplier->description }}</textarea>
        </div>
        <p class="text-danger text-center mt-4" data-toggle="modal" data-target="#elimatemodal">
            Bloquear
        </p>
        <button type="submit" class="btn btn-success my-4 btn-block">Editar</button>
    </form>
    
    
</div>
</div>

<div class="modal fade" id="elimatemodal" tabindex="-1" role="dialog" aria-labelledby="elimatemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿estás seguro?</h5>
            </div>
            <div class="row">
                <div class="col-md-3 offset-md-3 " style="margin-left:3em;">
                </div>
            </div>
      <div class="modal-body">
          <p>Quedara bloqueado el proveedor.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
        <form action="{{ route('rewards.destroy') }}" method="POST">
        <input type="hidden" name="id" value="2">
        <!-- se tiene que modificar -->
        @csrf
        <button type="button" class="btn btn-danger" id="accept">Bloquear</button>
        </form>
 
    </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

@endsection
