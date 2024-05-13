@extends('layouts.layout')

@section('title', 'Mascotas')

@section('content')


<div class="table-responsive my-5">
    <h1>Mis mascotas</h1>

    <table class="table">
        <thead>
            <th scope="col">Nombre</th>
            <th scope="col">Raza</th>
            <th scope="col">Peso</th>
            <th scope="col">Edad</th>
        </thead>
        <tbody class="table-group-divider">
            @if($pets->isEmpty())
            <p>No tienes mascotas registradas.</p>
            @else
            @foreach ($pets as $pet)
            <tr>
                <td>{{ $pet->name }}</td>
                <td>{{ $pet->breed }}</td>
                <td>{{ $pet->weight }} kg</td>
                <td>{{ $pet->age }} años</td>
                <td><a href="{{ route('pets.show', $pet->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-warning" ><i class="bi bi-pencil"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection