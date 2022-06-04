@extends('layouts.app')
 
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<!-- <a href="{{ url('suppliers/create') }}" class="btn btn-primary mb-2">Crear Proovedor</a> -->

<div class="table-responsive">
    <table class="table table-bordered table-sm">
            <tr>
                <th >Acciones</th>
                <th>Razon Social</th>
                <th>Cashback</th>
                <th>Estatus</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($suppliers as $supplier)
                <tr>
                    <td >
                        <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST">
                            <a class="btn btn-sm btn-info" href="{{ route('suppliers.show',$supplier->id) }}"><i class="fa-solid fa-eye"></i></a>
                            <!-- <a class="btn btn-sm btn-primary" href="{{ route('suppliers.edit',$supplier->id) }}"><i class="fa-solid fa-pencil"></i></a> -->
                            @csrf
                            @method('DELETE')
                            <!-- <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button> -->
                        </form>
                    </td>
                    <td>{{ $supplier->business_name }}</td>
                    <td>{{ $supplier->cashback }}</td>
                    <td>
                        <a href="">
                            @if($supplier->estatus == 0)
                                Pendiente
                            @elseif($supplier->estatus == 1)
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
