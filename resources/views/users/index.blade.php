@extends('layouts.layout')

@section('title', 'Usuarios')

@section('content')
<div class="table-responsive my-5">
    <h1>Lista de Usuarios</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Avatar</th>
      <th scope="col">Name</th>
      <th scope="col">Last Name</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($users as $user)
        <tr>
            <td><img src="{{ $avatarUrl }}" alt="Avatar"></td>
            <td>{{ $user->name . ' ' . $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Ver</a>
            </td>
        </tr>
        @endforeach

    
  </tbody>
</table>
  {{ $users->links() }}
</div>
@endsection