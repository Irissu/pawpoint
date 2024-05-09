
<div class="table my-5">
    <h1>Resumen de Citas</h1>
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
        </tr>
        @endforeach

  </tbody>
</table>
</div>
