@extends('layouts.layout')

@section('title', 'STARK QUOTES')

@section('content')
<div class="table-responsive my-5">


    <h1>API pruebas</h1>
    @foreach ($characters as $character)
    <div class="card">

        <div class="d-flex  justify-content-between flex-column">

            <div class="card-body border">
                <!--Contenido-->
                <h2>{{ $character['name'] }}</h2>
                <p>{{ $character['name'] }}</p>
                <!--FIN Contenido-->
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection