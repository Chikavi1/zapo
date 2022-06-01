@extends('layouts.app')
 
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<a href="{{ url('suppliers/create') }}">Crear Proovedor</a>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
        @php
            $i = 0;
        @endphp
        @foreach ($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->business_name }}</td>
                <td>{{ $supplier->email }}</td>
                <td>
                    <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('suppliers.show',$supplier->id) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('suppliers.edit',$supplier->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
