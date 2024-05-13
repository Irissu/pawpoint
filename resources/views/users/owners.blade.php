@extends('layouts.layout')

@section('title', 'Dueños')

@section('content')
<div class="table-responsive my-5">
    <h1>Lista de Dueñoss</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Avatar</th>
      <th scope="col">Name</th>
      <th scope="col">Last Name</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($owners as $owner)
        <tr>
            @if (isset($owner->image->url))
            <!--utilizo las imagenes generadas desde el seeder-->
            <td><img src=" {{ asset($owner->image->url) }}"></td>
            @endif
            <td>{{ $owner->name . ' ' . $owner->lastname }}</td>
            <td>{{ $owner->email }}</td>
            <td>
                <a href="{{ route('users.show', $owner->id) }}" class="btn btn-info">Ver</a>
            </td>
        </tr>
        @endforeach

    
  </tbody>
</table>

</div>


@endsection