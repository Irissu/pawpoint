@extends('layouts.layout')

@section('title', 'Registrar nueva cita')

@section('content')

<div class="container" class="d-flex align-items-center py-4 ">


    

    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="shadow p-5 m-4 rounded">
    <h1 class="text-center mt-4">Editar cita</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        @csrf
        @method('put')
        <p><strong>Dueño:</strong> {{ $appointment->pet->user->name }}</p>
                <p><strong>Día:</strong> {{ $appointment->appointment_date }}</p>
                <p><strong>Actual Status:</strong> {{ $appointment->status }}</p>
                <p><strong>Descripcion:</strong> {{ $appointment->description }}</p>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Editar Descripcion</label>
            <textarea class="form-control" id="description" row="1" name="description">{{ $appointment->description }}</textarea>
            @if ($errors->has('description'))
            <div class="alert alert-danger mt-1">{{ $errors->first('description') }}</div>
            @endif
        </div> 

        <div class="form-group mb-3">
        <label for="status" class="form-label">Editar Status</label>
        <select name="status" id="status" class="form-control" required>
                         <option value="completed">Completada</option>
                         <option value="pending">Pendiente</option>
                         <option value="cancelled">Cancelada</option>
                           
                      </select>
            @if ($errors->has('status'))
            <div class="alert alert-danger mt-1">{{ $errors->first('status') }}</div>
            @endif
        </div> 

        <button type="submit" class="btn btn-primary">Editar cita</button>
    </form>
    </div>

@endsection('content')