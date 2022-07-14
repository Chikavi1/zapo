@extends('layouts.app')
 
@section('content')
    <div class="row container">
        <div class="col-lg-11">
            <h2 class="text-capitalize">{{ $supplier->name }}</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary mb-4" href="{{ url('suppliers') }}"> Regresar</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <td class="text-capitalize">{{ $supplier->name }}</td>
        </tr>
        <tr>
            <th>Razon social</th>
            <td class="text-capitalize">{{ $supplier->business_name }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $supplier->description }}</td>
        </tr>
 
    </table>
    <a class="btn btn-sm btn-success btn-block" href="{{ route('suppliers.edit',$supplier->id) }}"><i class="fa-solid fa-pencil"></i> Modificar</a>

@endsection