@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2 class="text-capitalize">{{ $supplier->name }}</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('suppliers') }}"> Regresar</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <td>{{ $supplier->name }}</td>
        </tr>
        <tr>
            <th>Razon social</th>
            <td>{{ $supplier->business_name }}</td>
        </tr>
        <tr>
            <th>Correo</th>
            <td>{{ $supplier->email }}</td>
        </tr>
 
    </table>
@endsection