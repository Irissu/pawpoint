
<div class="table my-5">
    <h1>Resumen de Citas</h1>
<table class="table-responsive-xl table-striped table-bordered" style="border: 1px solid black">
  <thead>
    <tr>
      <th scope="col">Día</th>
      <th scope="col">Status</th>
      <th scope="col">Descripción</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($appointments as $appointment)
        <tr >
            <td style="border: 1px solid black">{{ $appointment->appointment_date }}]</td>
            @if ($appointment->status == 'pending')
                <td style="padding: 10px; background-color:#CCCCC0">{{ $appointment->status }}</td>
            @elseif ($appointment->status == 'completed')
                <td class="bg-success" style="padding: 10px; background-color:#20D779">{{ $appointment->status }}</td>
            @else
                <td class="bg-danger" style="padding: 10px; background-color:#F9183D">{{ $appointment->status }}</td>
            @endif
            <td style="padding: 10px; border:1px solid black">{{ $appointment->description }}</td>
        </tr>
        @endforeach

  </tbody>
</table>
</div>
