@extends('layouts.app')
 
@section('content')
    @if(!Auth::user())
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <img
                    src="{{ URL::asset('public/photos/'.$supplier->photo) }}"
                    style="border-radius:1em;max-width:10em;object-fit:cover;" alt="">
                </div>
                <div class="col-md-8 col-sm-12">
                    <td class="text-capitalize">{{ $supplier->name }}</td>
                    <td class="text-capitalize">({{ $supplier->business_name }})</td>
                    <p>{!! $supplier->description !!}</p>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <h2>Regalos</h2>
            @if(count($rewards)==0)
                <p>Por el momento no tienen regalos vigentes.</p>
            @endif
            <div class="row">
                @foreach($rewards as $reward)
                <div class="col-md-4 col-sm-12">
                <div class="card" style="width: 20rem;max-height:30em;height:30em;margin-top:1em">
                    <img class="card-img-top"
                     style="max-height:15em;object-fit: cover;"  
                     src="{{ URL::asset('public/photos/'.$reward->photos) }}"  alt="Imagenes del regalo">
                    <div class="card-body">
                        <h5 class="text-capitalize card-title">{{ $reward->name }}</h5>
                        <p class="text-success">Puntos {{ $reward->points }}</p>
                        <p class="card-text">Creado por: {{ $reward->users?$reward->users->name:'Admin' }}</p>
                        <p class="card-text">{!! $reward->description !!}</p>
                       
                    </div>
                </div>
                </div>
                @endforeach
            </div>

        </div>
        
    @endif
@if(Auth::user())
    <div class="row container">
        <div class="col-lg-10 offset-lg-1">
            <h2 class="text-capitalize">{{ $supplier->name }}</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary mb-4" href="{{ url('suppliers') }}"> Regresar</a>
        </div>
    </div>

    
        @if(Auth::user() && Auth::user()->type != 0)
        @endif
    @endif

    @if(Auth::user())

    @if(Auth::user()->type === 0)
    <table class="container table table-bordered">
        <tr>
            <th>Imagen</th>
            <td class="text-capitalize">    
                <img src="{{$supplier->photo}}" style="border-radius:1em;" alt="">
            </td>
        </tr>
        <tr>
            <th>Nombre Empresa</th>
            <td class="text-capitalize">{{ $supplier->name }}</td>
        </tr>
        <tr>
            <th>Razon social</th>
            <td class="text-capitalize">{{ $supplier->business_name }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{!! $supplier->description !!}</td>
        </tr>
        <tr>
            <th>Nombre Usuario</th>
            <td>{{ $supplier->users->name }}</td>
        </tr>
        <tr>
            <th>Correo electrónico</th>
            <td>{{ $supplier->users->email }}</td>
        </tr>
        <tr>
            <th>Teléfono </th>
            <td>{{ $supplier->users->cellphone }}</td>
        </tr>

        <tr>
            <th>Dirección </th>
            <td>{{ $supplier->users->address }}</td>
        </tr>
 
    </table>
    

    <div class="container">
        <a class="btn btn-sm btn-success btn-block" href="{{ route('suppliers.edit',$supplier->id) }}"><i class="fa-solid fa-pencil"></i> Modificar</a>
    </div>
    @endif
    @endif

@endsection