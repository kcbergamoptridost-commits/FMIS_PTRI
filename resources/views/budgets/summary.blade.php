@extends('layouts.app')

@section('content')

<div class="container">

<h2 class="mb-4">Budget Summary</h2>

<table class="table table-bordered">

<thead>
<tr>
<th>Program / Activity</th>
<th>Personal Services</th>
<th>MOOE</th>
<th>Capital Outlay</th>
<th>Total</th>
</tr>
</thead>

<tbody>

<tr>
<td>General Management and Supervision</td>
<td>₱ {{ number_format($gms->ps,2) }}</td>
<td>₱ {{ number_format($gms->mooe,2) }}</td>
<td>₱ {{ number_format($gms->co,2) }}</td>
<td>₱ {{ number_format($gms->ps + $gms->mooe + $gms->co,2) }}</td>
</tr>

<tr>
<td>Human Resource Development</td>
<td>₱ {{ number_format($hrd->ps,2) }}</td>
<td>₱ {{ number_format($hrd->mooe,2) }}</td>
<td>₱ {{ number_format($hrd->co,2) }}</td>
<td>₱ {{ number_format($hrd->ps + $hrd->mooe + $hrd->co,2) }}</td>
</tr>

<tr>
<td>Textile R&D Program</td>
<td>₱ {{ number_format($rd->ps,2) }}</td>
<td>₱ {{ number_format($rd->mooe,2) }}</td>
<td>₱ {{ number_format($rd->co,2) }}</td>
<td>₱ {{ number_format($rd->ps + $rd->mooe + $rd->co,2) }}</td>
</tr>

<tr>
<td>Science & Technology Program</td>
<td>₱ {{ number_format($st->ps,2) }}</td>
<td>₱ {{ number_format($st->mooe,2) }}</td>
<td>₱ {{ number_format($st->co,2) }}</td>
<td>₱ {{ number_format($st->ps + $st->mooe + $st->co,2) }}</td>
</tr>

<tr>
<td>Technology Transfer Program</td>
<td>₱ {{ number_format($tt->ps,2) }}</td>
<td>₱ {{ number_format($tt->mooe,2) }}</td>
<td>₱ {{ number_format($tt->co,2) }}</td>
<td>₱ {{ number_format($tt->ps + $tt->mooe + $tt->co,2) }}</td>
</tr>

</tbody>

</table>

</div>

@endsection