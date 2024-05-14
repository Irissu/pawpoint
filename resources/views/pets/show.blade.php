@extends('layouts.layout')

@section('title', 'Mascota' . '' . $pet->name)

@section('content')
    
<h2 class="mt-5">Informacion de mascota</h2>
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <div class="bg-white p-5 shadow rounded">
                <h1>{{ $pet->name }}</h1>
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
            
                <p><strong>Peso:</strong> {{ $pet->weight }}</p>
                <p><strong>Tipo:</strong> {{ $pet->type }}</p>
                <p><strong>Edad:</strong> {{ $pet->age }}</p>
                <p><strong>Raza:</strong> {{ $pet->breed }}</p>
        
                <form method="post" class="my-2" action=" {{ route('pets.destroy', $pet->id) }}">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
            </div>


        </div>
    </div>
</div>

@endsection