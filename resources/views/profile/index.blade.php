    @extends('layouts.app')
    
    @section('content')
    <div class="row">
        <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item" >
                <a href="/redeem">
                Ver mis premios
                </a>    
            </li>
            <li class="list-group-item" >Editar perfil </li>
            <li class="list-group-item">Convertirte en provedor</li>
            <li class="list-group-item">FAQ</li>
            <li class="list-group-item">Atención al cliente</li>
            <li class="list-group-item">  <form method="POST" action="{{ route('logout') }}">
          @csrf
          <input type="submit" class="btn btn-link"  style="color:red;text-decoration:none;"value="Cerrar sesión"></input>
        </form></li>
        </ul>

        </div>
    
        <div class="col-md-9">
            <div class="card p-4">
                <div class="row">
                    <div class="col-md-3">
                        <img style="border-radius:50%;" src="https://avatars.dicebear.com/api/initials/{{$user->name}}.svg" alt="">
                    </div>
                    <div class="col-md-9">
                        <p style="font-weight:bold;">{{ $user->name }}</p> 
                        <p>{{ $user->points}} puntos</p>
                        <p>{{ $user->cellphone }}</p>
                        <p>
                            @if($user->type === 0)
                                Admin
                            @elseif($user->type === 1)
                                Cliente
                            @elseif($user->type === 2)
                                Proveedor
                            @elseif($user->type === 3)
                                Despachador
                            @endif
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection