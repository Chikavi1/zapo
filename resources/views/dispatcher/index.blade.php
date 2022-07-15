@extends('layouts.app')

@section('content')
<div class="container">

    <h2>Despachadores</h2>
    <a href="{{ url('dispatcher/create') }}" class="btn btn-primary mb-2">Agregar Despachador</a>
    
    @if(count($dispatchers) != 0)
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <tr>
                <th>Acciones</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Estatus</th>
            </tr>
            @php
            $i = 0;
            @endphp
            @foreach ($dispatchers as $dispatcher)
            <tr>
                <td >
                <form action="{{ route('dispatcher.destroy') }}" method="POST">
                    <a class="btn btn-sm btn-info" href="{{ route('dispatcher.edit',Hashids::encode($dispatcher->id)) }}"><i class="fa-solid fa-eye"></i></a>
                    @csrf
                    <input type="hidden" name="id" value="{{ Hashids::encode($dispatcher->id) }}" />
                   @if($dispatcher->estatus != 0)
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    @endif
                </form>
                    </td>
                    <td>{{ $dispatcher->name }}</td>
                    <td>{{ $dispatcher->cellphone }}</td>
                    <td>{{ $dispatcher->email }}</td>
                    <td>
                            @if($dispatcher->estatus === 0)
                            Eliminado
                            @elseif($dispatcher->estatus == 1)
                            Pendiente
                            @else
                            Disponibles
                            @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        @else
        <h2 class="text-center">No hay despachadores por el momento.</h2>
        @endif
        
    </div>
@endsection