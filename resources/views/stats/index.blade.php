@extends('layouts.app')

@section('content')
    <h3 class="text-center" style="margin-bottom:2em;">Estadisticas</h3>
    <div class="row">
        <div class="col-md-5">
            <div class="card text-center">
                <p >Movimientos Generados</p>
                <h3>{{$movements}}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <p >Total reclamos</p>
                <h3>{{$reclaims}}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <p >Total premios</p>
                <h3>{{$rewards}}</h3>
            </div>
        </div>
    </div>

    
</div>

<div class="row">
<div class="col-md-10 offset-md-1 mt-4 card">
    <h5 class="p-2">Grafica</h5>
</div>


@endsection