@extends('layouts.layout')

@section('title', 'Registrar nueva cita')

@section('content')

<div class="container" class="d-flex align-items-center py-4 ">
    

    <form action="{{ route('appointments.store') }}" method="POST" class="shadow p-5 m-4 rounded">
    <h1 class="text-center mt-4">Registrar nueva cita</h1>
        @csrf
        <div class="form-group mb-3">
            <label for="appointment_date" class="form-label">Dia de la Cita</label>
            <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
            @if ($errors->has('appointment_date'))
            <div class="alert alert-danger mt-1">{{ $errors->first('appointment_date') }}</div>
            @endif
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Descripcion</label>
            <input type="text-area" class="form-control" id="description" name="description">
            @if ($errors->has('description'))
            <div class="alert alert-danger mt-1">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group mb-3">
        <label for="pet_id" class="form-label">Mascota asociada a la cita</label>
        <select name="pet_id" id="pet_id" class="form-control" required>
                         <option value=""></option>
                            @foreach($pets as $pet)
                                <option value="{{ $pet->id }}" name="{{ $pet->id }}">{{ $pet->name }}</option>
                            @endforeach
                      </select>
            @if ($errors->has('pet_id'))
            <div class="alert alert-danger mt-1">{{ $errors->first('pet_id') }}</div>
            @endif
        </div> 

        <button type="submit" class="btn btn-primary">Registrar cita</button>
    </form>
    </div>

@endsection('content')