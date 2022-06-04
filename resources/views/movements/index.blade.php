@extends('layouts.app')
    
    @section('content')
    @if(count($movements) != 0)
    <a href="/movements/create" class="btn btn-primary">Generar Movimiento</a>
        <table class="table table-bordered mt-4">
            <tr>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Estatus</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($movements as $movement)
                <tr>
                    <td>{{ date('d/m/Y h:i a',strtotime($movement->created_at))  }}</td>
                    <td>{{ $movement->amount }}</td>
                    <td>
                        @if($movement->status == 1)
                            <span>Disponible</span>
                        @else
                            <span>Cancelado</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h4 class="text-center">Por el momento no haz registrado ningun movimiento.</h4>
        <p class="text-center">
        <a href="/movements/create" class="btn btn-primary">Generar Movimiento</a>
        </p>
    @endif
    @endsection