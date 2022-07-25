@extends('layouts.app')
 
@section('content')
<div class="container">
@if( Auth::check() && Auth::user()->type == 0)

<h2>Usuarios</h2>

    <a href="{{ url('users/create') }}" class="btn btn-primary mb-2">Crear Usuario</a>
    <div class="table-responsive">
    <table class="table table-bordered table-sm">
            <tr>
                <th>Acciones</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Estatus</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <td>
                    <a class="btn btn-sm btn-info" href="{{ route('users.edit',$user->id) }}"><i class="fa-solid fa-eye"></i></a>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->cellphone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a data-toggle="modal" data-target="#elimatemodal">
                            @if($user->estatus == 0)
                                Pendiente
                            @elseif($user->estatus == 1)
                                Disponible
                            @else
                                Bloqueado
                            @endif
                        </a>
                    </td>
                </tr>
            @endforeach
    </table>
</div>
@else
<h2>No tienes permisos para ver esta información.</h2>
@endif

</div>

@endsection