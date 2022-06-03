@extends('layouts.app')
@section('content')
<div class="d-none d-md-block d-sm-none">
    <div class="row">
        <div class="col-lg-11">
            <h2 class="text-capitalize">{{ $reward->name }}</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('rewards') }}"> Regresar</a>
        </div>
    </div>
    <table class="table table-bordered">
         <tr>
            <th>Fotos</th>
            <td> <img style="width:200px;" src="{{ URL::asset('public/photos/'.$reward->photos) }}" alt="{{ $reward->name }}"> </td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $reward->name }}</td>
        </tr>
        <tr>
            <th>Puntos</th>
            <td>{{ $reward->points }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{!! $reward->description !!}</td>
        </tr>
        <tr>
            <th>Condiciones</th>
            <td>{!! $reward->conditions !!}</td>
        </tr>
       
 
    </table>
</div>

<div class="d-block d-sm-none">
  
            <a class="btn btn-primary" href="{{ url('rewards') }}"> Regresar</a>
<img style="width:100% !important;" src="{{ URL::asset('public/photos/'.$reward->photos) }}" alt="{{ $reward->name }}">
<h3 class="text-capitalize">{{ $reward->name }}</h3>
<p style="color:green;">Se necesitan {{  $reward->points }} puntos </p>
<div class="card p-2">
    <p style="font-weight:bold;color:grey;">Descripción</p>
    <p>
        {!! $reward->description !!}
    </p> 
</div>
<div class="card p-2">
    <p>Condiciones</p>
    <p>
        {!! $reward->conditions !!}
    </p> 
</div>
</div>
@endsection