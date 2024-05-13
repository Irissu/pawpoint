@extends('layouts.layout')

@section('title', 'Citas programadas')

@section('content')
<div class="table my-5">
    <h1>Lista de Citas</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning">{{ session('warning') }}</div>
    @endif

<table class="table-responsive-xl">
  <thead>
    <tr>
      <th scope="col">Día</th>
      <th scope="col">Status</th>
      <th scope="col">Descripción</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($appointments as $appointment)
        <tr>
            <td>{{ $appointment->appointment_date }}]</td>
            @if ($appointment->status == 'pending')
                <td class="bg-warning " style="padding: 10px">{{ $appointment->status }}</td>
            @elseif ($appointment->status == 'completed')
                <td class="bg-success" style="padding: 10px">{{ $appointment->status }}</td>
            @else
                <td class="bg-danger" style="padding: 10px">{{ $appointment->status }}</td>
            @endif
            <td style="padding: 10px">{{ $appointment->description }}</td>
            <td>
                <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning" ><i class="bi bi-pencil"></i></a>
                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash3"></i>
                    </button>
                </form>
            </td>
            
        </tr>
        @endforeach

        <a href="{{ route('appointments.report')}}" class="btn btn-primary">Descargar en PDF</i></a>
  </tbody>
</table>
</div>
@endsection