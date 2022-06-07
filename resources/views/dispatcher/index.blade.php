@extends('layouts.app')

@section('content')
 <h2>Despachadores</h2>
 <a href="{{ url('dispatcher/create') }}" class="btn btn-primary mb-2">Agregar Despachador</a>

 @if(count($dispatchers) != 0)
<div class="table-responsive">
    <table class="table table-bordered table-sm">
            <tr>
                <th>Acciones</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Estatus</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($dispatchers as $supplier)
                <tr>
                    <td >
                        
                    </td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->cellphone }}</td>

                    <td>
                        <a href="">
                            @if($supplier->estatus == 0)
                                Pendiente
                            @elseif($supplier->estatus == 1)
                                Disponible
                            @else
                                Bloqueado
                            @endif
                        </a>
                    </td>
                </tr>
            @endforeach
    </table>
</div>
@else
    <h2 class="text-center">No hay despachadores por el momento.</h2>
@endif

@endsection