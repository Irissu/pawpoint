@extends('layouts.layout')

@section('title', 'Mascotas')

@section('content')

<div class="table-responsive">
   @if(session('success'))
        <div class="alert alert-success my-2">
          {{ session('success') }}
        </div>
      @endif
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Avatar</th>
        <th scope="col">Nombre</th>
        <th scope="col">Peso</th>
        <th scope="col">Raza</th>
        <th scope="col">Edad</th>
        <th scope="col">Tipo</th>
        <th scope="col">Dueño</th>
      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($pets as $pet)
      <tr>
        <td>Image</td>
        <td>{{ $pet->name}}</td>
        <td>{{ $pet->weight}}</td>
        <td>{{ $pet->breed}}</td>
        <td>{{ $pet->age}}</td>
        <td>{{ $pet->type}}</td>
        <td>{{ $pet->user->name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection