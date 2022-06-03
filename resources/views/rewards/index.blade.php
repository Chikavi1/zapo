@extends('layouts.app')
@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@if(Auth::user()->type === 0)

<a href="{{ url('rewards/create') }}" class="btn btn-primary mb-2">Crear Regalo</a>
@elseif(Auth::user()->type === 1)
<h2>Regalos que tenemos para ti</h2>
@endif
<!-- <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Puntos</th>
            <th>Descripción</th>
            <th>Condiciones</th>
            <th>Fotos</th>
            <th width="280px">Acciones</th>
        </tr>
        @php
            $i = 0;
        @endphp
        @foreach($rewards as $reward)
            <tr>
                <td>{{ $reward->id }}</td>
                <td>{{ $reward->name }}</td>
                <td>{{ $reward->points }}</td>
                <td>{!! $reward->description !!}</td>
                <td>{!! $reward->conditions !!}</td>
                <td><img style="width:200px;" src="{{ URL::asset('public/photos/'.$reward->photos) }}" alt="imagen del regalo">  </td>                
                <td>
                    <form action="{{ route('rewards.destroy') }}" method="POST">
                        <a class="btn btn-outline-info" href="{{ route('rewards.show',$reward->id) }}"><i class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-outline-primary" href="{{ route('rewards.edit',$reward->id) }}"><i class="fa-solid fa-pencil"></i></a>
                        @csrf
                        <input type="hidden" name="id" value="{{ $reward->id }}">
                        <button onClick="alert('¿estás seguro?')" type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
</table> -->
    

    <div class="row">
    @foreach($rewards as $reward)

        <div class="col-xs-12 col-md-4">
            <div class="card" style="width: 20rem;max-height:30em;height:30em;margin-top:1em">
                <img class="card-img-top" style="max-height:15em;object-fit: cover;"  src="{{ URL::asset('public/photos/'.$reward->photos) }}"  alt="Imagenes del regalo">
                <div class="card-body">
                    <h5 class="text-capitalize card-title">{{ $reward->name }}</h5>
                    <p class="text-success">Puntos {{ $reward->points }}</p>
                    <p class="card-text">{!! $reward->description !!}</p>
                    @if(Auth::user()->points >= $reward->points)
                    <p class="text-center ">
                        <button class="btn btn-success" data-toggle="modal" data-target="#qrmodal">
                        Canjear
                        </button>
                    </p>
                    @endif
                    @if(Auth::user()->type === 0)
                            <a class="btn btn-outline-info" href="{{ route('rewards.show',$reward->id) }}"><i class="fa-solid fa-eye"></i></a>
                            <a class="btn btn-outline-primary" href="{{ route('rewards.edit',$reward->id) }}"><i class="fa-solid fa-pencil"></i></a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#elimatemodal">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                    @else
                        <p class="text-center"><a href="{{ route('rewards.show',$reward->id) }}">Ver</a></p>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    

<div class="modal fade" id="elimatemodal" tabindex="-1" role="dialog" aria-labelledby="elimatemodalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿estás seguro?</h5>
      </div>
      <div class="row">
          <div class="col-md-3 offset-md-3 " style="margin-left:3em;">
          </div>
      </div>
      <div class="modal-body">
          <p>Ya no estará disponible este regalo.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-dismiss="modal">Cerrar</button>
        <form action="{{ route('rewards.destroy') }}" method="POST">
        <input type="hidden" name="id" value="2">
        <!-- se tiene que modificar -->
        @csrf
        <button type="button" class="btn btn-danger" id="accept">Eliminar</button>
        </form>
 
    </div>
    </div>
  </div>
</div>

<div class="modal fade" id="qrmodal" tabindex="-1" role="dialog" aria-labelledby="qrmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿estás seguro?</h5>
      </div>
      <div class="row">
          <div class="col-md-3 offset-md-3 " style="margin-left:3em;">
          </div>
      </div>
      <div class="modal-body">
          <p>Al aceptar ya no se podra hacer una devolución de puntos.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="accept">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>

    $('#accept').click(()=> {
        var data = {
        '_token':'{!! csrf_token() !!}',
        'id_users': 3,
        'id_rewards': 1,
    };
    url = "http://127.0.0.1:8000/createReclaim";

  $.post(url,data,function(r){
     console.log(r)
     
  });
});
</script>


@endsection
