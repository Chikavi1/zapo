@extends('layouts.app')
 
@section('content')
<h2>Usuarios</h2>

<div class="table-responsive">
    <table class="table table-bordered table-sm">
            <tr>
                <th>Acciones</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Tipo</th>
                <th>Estatus</th>

            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($users as $user)
                <tr>
                    <td >
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <!-- <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button> -->
                        </form>
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->cellphone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->type }}</td>

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
@endsection