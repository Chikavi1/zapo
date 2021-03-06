@extends('layouts.app')
 
@section('content')
<div class="container">
  
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <!-- <a href="{{ url('suppliers/create') }}" class="btn btn-primary mb-2">Crear Proovedor</a> -->
    @if(count($suppliers) != 0)
    <div class="container table-responsive">
        <table class="table table-bordered table-sm">
                <tr>
                    <th>Acciones</th>
                    <th>Razon Social</th>
                    <th>Porcentaje de Retorno</th>
                    <th>Estatus</th>
                </tr>
                @php
                    $i = 0;
                @endphp
                @foreach ($suppliers as $supplier)
                    <tr>
                        <td >
                            <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST">
                                <a class="btn btn-sm btn-info" href="{{ route('suppliers.show',$supplier->id) }}"><i class="fa-solid fa-eye"></i></a>
                                <!-- <a class="btn btn-sm btn-primary" href="{{ route('suppliers.edit',$supplier->id) }}"><i class="fa-solid fa-pencil"></i></a> -->
                                @csrf
                                @method('DELETE')
                                <!-- <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button> -->
                            </form>
                        </td>
                        <td>{{ $supplier->business_name }}</td>
                        <td>{{ $supplier->cashback }}</td>
                        <td>
                            @if($supplier->estatus == 0)
                                <button class="update btn" data-toggle="modal" data-target="#updatetoavailable" data-id="{{ $supplier->id }}">
                                    Pendiente
                                </buton>
                                @elseif($supplier->estatus == 1)
                                   <p style="color:green;">Disponible </p> 
                                @else
                                   <p style="color:red;">Bloqueado </p> 
                                @endif
                        </td>
                    </tr>
                @endforeach
        </table>
    </div>
    @else
        <h2 class="text-center">No hay proveedores por el momento</h2>
    @endif


    <div class="modal fade" id="updatetoavailable" tabindex="-1" role="dialog" aria-labelledby="elimatemodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">??est??s seguro?</h5>
            </div>
            <div class="row">
                <div class="col-md-3 offset-md-3 " style="margin-left:3em;">
                </div>
            </div>
            <div class="modal-body">
                <p>Este proovedor va estar disponible.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
                <form action="{{ route('suppliers.available') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <input type="submit" class="btn btn-success" value="Disponible"/>
                </form>
        
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
    $(".update").on("click",function(){
        var id = $(this).data('id');
        $(".modal-footer #id").val( id );
    });
    </script>

    @endsection
  
</div>