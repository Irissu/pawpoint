@extends('layouts.layout')

@section('title', 'Registrar mascota')

@section('content')

<div class="container" class="d-flex align-items-center py-4 ">
    

    <form action="{{ route('pets.store') }}" method="POST" class="shadow p-5 m-4 rounded">
    <h1 class="text-center mt-4">Registrar Mascota</h1>
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
            @if ($errors->has('name'))
            <div class="alert alert-danger mt-1">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="weight" class="form-label">Peso</label>
            <input type="number" class="form-control" id="weight" name="weight">
            @if ($errors->has('weight'))
            <div class="alert alert-danger mt-1">{{ $errors->first('weight') }}</div>
            @endif
        </div>

        <div class="form-group mb-3">
        <label for="type" class="form-label">Tipo</label>
        <select name="type" id="type" class="form-control" value="{{ old('type_id') }}" required>
                         <option value=""></option>
                         <option value="cat">gato</option>
                         <option value="dog">perro</option>
                      </select>
            @if ($errors->has('type'))
            <div class="alert alert-danger mt-1">{{ $errors->first('type') }}</div>
            @endif
        </div>


        <div class="form-group mb-3">
            <label for="breed" class="form-label">Raza</label>
            <input type="text" class="form-control" id="breed" name="breed">
            @if ($errors->has('breed'))
            <div class="alert alert-danger mt-1">{{ $errors->first('breed') }}</div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="age" class="form-label">Edad</label>
            <input type="number" class="form-control" id="age" name="age">
            @if ($errors->has('age'))
            <div class="alert alert-danger mt-1">{{ $errors->first('age') }}</div>
            @endif
        </div>
      

        <button type="submit" class="btn btn-primary">Registrar mascota</button>
    </form>
    </div>

@endsection('content')