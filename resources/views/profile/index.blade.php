    @extends('layouts.app')
    @section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <div class="d-none d-md-block ">
        <div class="row">
            <div class="col-md-3">
            <ul class="list-group">
                    <li class="list-group-item">
                            <a href="/edit-profile">
                                Editar perfil
                            </a>
                    </li>
                    @if($user->type === 1)
                        <li class="list-group-item" >
                            <a href="/redeem">
                            Ver mis premios canjeados
                            </a>    
                        </li>
                        <li class="list-group-item">
                            <a href="/convert">
                                Convertirte en proveedor
                            </a>     
                        </li>
                    @endif
                        <li class="list-group-item">FAQ</li>
                        <li class="list-group-item">
                        <a href="https://wa.me/5213311766777">
                            Atención al cliente
                        </a>    
                    </li>
                    <li class="list-group-item">  
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" class="btn btn-link"  style="color:red;text-decoration:none;"value="Cerrar sesión"></input>
                        </form>
                    </li>
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
                            @if($user->type === 1)
                            <p>{{ $user->points}} puntos</p>
                            @endif
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
    </div>

    <div class="d-block d-sm-none">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card p-4">
                    <div class="row">
                        <div class="col-md-3">
                            <p style="text-align:center;">

                                <img style="border-radius:50%;" width="150" src="https://avatars.dicebear.com/api/initials/{{$user->name}}.svg" alt="">
                            </p>
                        </div>
                        <p style="font-weight:bold;margin-top:1em;text-align:center">{{ $user->name }}</p> 
                        <div class="col-md-9 card shadow-lg p-4">
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
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item">
                            <a href="/edit-profile">
                                Editar perfil
                            </a>
                    </li>
                    @if($user->type === 1)
                        <li class="list-group-item" >
                            <a href="/redeem">
                            Ver mis premios canjeados
                            </a>    
                        </li>
                        <li class="list-group-item">
                        <a href="/convert">
                                Convertirte en proveedor
                            </a>  
                        </li>
                    @endif
                        <li class="list-group-item">FAQ</li>
                        <li class="list-group-item">
                        <a href="https://wa.me/5213311766777">
                            Atención al cliente
                        </a>    
                    </li>
                    <li class="list-group-item">  
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input type="submit" class="btn btn-link"  style="color:red;text-decoration:none;"value="Cerrar sesión"></input>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @endsection