@extends('layouts.app')
    
    @section('content')
    <a href="/movements/create" class="btn btn-primary">Generar Movimiento</a>
    <table class="table table-bordered mt-4">
        <tr>
            <th>No</th>
            <th>Fecha</th>
            <th>Cantidad</th>
            <th>Estatus</th>
        </tr>
        @php
            $i = 0;
        @endphp
        @foreach ($movements as $movement)
            <tr>
                <td>{{ $movement->id }}</td>
                <td>{{ $movement->created_at }}</td>
                <td>{{ $movement->amount }}</td>
                <td>{{ $movement->status }}</td>
            </tr>
        @endforeach
    </table>

    @endsection