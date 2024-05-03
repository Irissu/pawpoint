@extends('layouts.layout')

@section('title', 'Usuario:' . ' ' .  $user->name )

@section('content')

<h2 class="mt-5">Información de Usuario</h2>
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <div class="bg-white p-5 shadow rounded">
                <h1>{{ $user->name }}</h1>
                <p><strong>Apellido:</strong> {{ $user->lastname }}</p>
                <p><strong>DNI:</strong> {{ $user->id }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                  @foreach ($user->types as $type)
                <p><strong>Rol de usuario:</strong> 
                        @if ($type->pivot->type_id == 1)
                        'Dueño'
                        @else
                    'Veterinario'
                   @endif
                </p>
                   @endforeach
                
            </div>
        </div>
    </div>
</div>
<!-- {{ $type->pivot->type_id }} -->

@endsection