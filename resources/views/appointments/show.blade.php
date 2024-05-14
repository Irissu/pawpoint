@extends('layouts.layout')

@section('title', 'Cita:' )

@section('content')

<h2 class="mt-5">Información de Cita</h2>
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <div class="bg-white p-5 shadow rounded">
                <h1>Mascota: {{ $appointment->pet->name }}</h1>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                 @endif
                <p><strong>Tipo:</strong>@if($appointment->pet->type == 'dog') 
                    Perro
                        @else
                    Gato
                @endif
                </p>
                <p><strong>Dueño:</strong> {{ $appointment->pet->user->name }}</p>
                <p><strong>Día:</strong> {{ $appointment->appointment_date }}</p>
                <p><strong>Status:</strong> {{ $appointment->status }}</p>
                <p><strong>Descripcion:</strong> {{ $appointment->description }}</p>
            </div>
        </div>
    </div>
</div>


@endsection