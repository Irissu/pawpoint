@extends('layouts.layout')

@section('title', 'Lista de Gatos')

@section('content')

     <div class="table-responsive my-5">
        <h1>Lista de Gatos</h1>
    
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
           @foreach ($cats as $cat)
            <tr>
                <td>Imagen</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->breed }}</td>
                <td>{{ $cat->weight }}</td>
                <td>{{ $cat->age }}</td>
                <td>Dueño</td>
            </tr>
            @endforeach
    </tbody>
        </table>
     </div>


@endsection