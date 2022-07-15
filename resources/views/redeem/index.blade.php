@extends('layouts.app')

@section('content')
    <h3 class="text-center">Mis Premios</h3>
    @if($reclaims->count() === 0)
    <h2 class="text-center">Por el momento, no haz canjeado tus puntos por un premio.</h2>
    <p class="text-center"> 
        <a  href="{{ url('/profile') }}"> Regresar</a>
    </p>

    @endif
    <div class="row">
    @foreach($reclaims as $reward)

        <div class="col-xs-12 col-md-4">
            <div class="card" style="width: 18rem;max-height:30em;height:30em;margin-top:1em">
                <!-- <img class="card-img-top" style="max-height:15em;object-fit: cover;"  src="{{ URL::asset('public/photos/'.$reward->photos) }}"  alt="Imagenes del regalo"> -->
                <div class="card-body">
                    <img style="width:100% !important;max-height:15em;object-fit: cover;" class="img-fluid" src="{{ URL::asset('public/photos/'.$reward->rewards->photos) }}" alt="">
                  <p class="text-bold text-capitalize">{{ $reward->rewards->name }}</p>
                    <p class="text-center">
                        <!-- {!! QrCode::size(140)->generate($reward->token); !!} -->
                    </p>
                    <p>Generado el dia {{ date('d/m/Y',strtotime($reward->created_at ))}}</p>
                    @if($reward->status == 1)
                        <p class="text-warning text-center">Pendiente</p>
                    @else
                    <p class="text-success">Canjeado</p>
                    @endif
                    <p class="text-center">
                        <!-- <a href="" >Ver más</a> -->
                    </p>
                    <!-- <h5 class="card-title">{{ $reward->name }}</h5>
                    <p class="text-success">Puntos {{ $reward->points }}</p>
                    <p class="card-text">{!! $reward->description !!}</p>
                    @if(Auth::user()->points >= $reward->points)
                    <p class="text-center ">
                        <button class="btn btn-success" data-toggle="modal" data-target="#qrmodal">
                        Canjear
                        </button>
                    </p>
                    @endif
                    <p class="text-center"><a href="{{ route('rewards.show',$reward->id) }}">Ver</a></p> -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection