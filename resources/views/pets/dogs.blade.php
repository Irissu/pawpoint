@extends('layouts.layout')

@section('title', 'Lista de Perros')

@section('content')

     <div class="table-responsive my-5">
        <h1>Lista de Perros</h1>
    
        <table class="table">
            <thead>
                <th scope="col">Avatar</th>
                <th scope="col">Nombre</th>
                <th scope="col">Raza</th>
                <th scope="col">Peso</th>
                <th scope="col">Edad</th>
                <th scope="col">Dueño</th>
            </thead>
        <tbody class="table-group-divider">
           @foreach ($dogs as $dog)
            <tr>
                <td>Imagen</td>
                <td>{{ $dog->name }}</td>
                <td>{{ $dog->name }}</td>
                <td>{{ $dog->breed }}</td>
                <td>{{ $dog->weight }}</td>
                <td>{{ $dog->age }}</td>
                <td>Dueño</td>
            </tr>
            @endforeach
    </tbody>
        </table>
     </div>


@endsection