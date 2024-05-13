@extends('layouts.layout')

@section('title', 'GAME OF THRONES')

@section('content')
<div class="table-responsive my-5">


    <h1>API pruebas</h1>
    @foreach ($houses as $house)
    <div class="card">
        <div class="card-body border">
            <div class="d-flex  justify-content-between flex-column">
                <h2>Casa {{ $house['slug'] }} :</h2>
                <p>{{ $house['name'] }}</p>
                <h5>Miembros: </h5>
                @foreach ($house['members'] as $member)
                <p><strong>Name:</strong> {{ $member['name'] }}</p>
                <p><strong>Slug:</strong> {{ $member['slug'] }}</p>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection