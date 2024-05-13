@extends('layouts.layout')

@section('title', 'Veterinarios')

@section('content')
<div class="table-responsive my-5">
    <h1>Lista de Veterinarios</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Avatar</th>
      <th scope="col">Name</th>
      <th scope="col">Last Name</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($vets as $vet)
        <tr>
            <td><img src="{{ $vet->generateRandomAvatar() }}" alt="Avatar"></td>
            <td>{{ $vet->name . ' ' . $vet->lastname }}</td>
            <td>{{ $vet->email }}</td>
            <td>
                <a href="{{ route('users.show', $vet->id) }}" class="btn btn-info">Ver</a>
            </td>
        </tr>
        @endforeach

    
  </tbody>
</table>

</div>


@endsection