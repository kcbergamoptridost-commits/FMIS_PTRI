@extends('layouts.app')

@section('content')

<h3 class="mb-4">Budget Summary</h3>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="mb-3">
<a href="{{ route('budgets.create') }}" class="btn btn-primary">
+ Create Budget
</a>
</div>

@php

$gms_ps = $gms_mooe = $gms_co = 0;
$hrd_ps = $hrd_mooe = $hrd_co = 0;

$rd_ps = $rd_mooe = $rd_co = 0;
$st_ps = $st_mooe = $st_co = 0;
$tt_ps = $tt_mooe = $tt_co = 0;

foreach($budgets as $b){

    if($b->program == "General Management and Supervision"){
        if($b->expense_class == "PS") $gms_ps += $b->total_amount;
        if($b->expense_class == "MOOE") $gms_mooe += $b->total_amount;
        if($b->expense_class == "CO") $gms_co += $b->total_amount;
    }

    if($b->program == "Human Resource Development"){
        if($b->expense_class == "PS") $hrd_ps += $b->total_amount;
        if($b->expense_class == "MOOE") $hrd_mooe += $b->total_amount;
        if($b->expense_class == "CO") $hrd_co += $b->total_amount;
    }

    if($b->program == "Textile R&D Program"){
        if($b->expense_class == "PS") $rd_ps += $b->total_amount;
        if($b->expense_class == "MOOE") $rd_mooe += $b->total_amount;
        if($b->expense_class == "CO") $rd_co += $b->total_amount;
    }

    if($b->program == "Textile S&T Services Program"){
        if($b->expense_class == "PS") $st_ps += $b->total_amount;
        if($b->expense_class == "MOOE") $st_mooe += $b->total_amount;
        if($b->expense_class == "CO") $st_co += $b->total_amount;
    }

    if($b->program == "Textile Technology Transfer Program"){
        if($b->expense_class == "PS") $tt_ps += $b->total_amount;
        if($b->expense_class == "MOOE") $tt_mooe += $b->total_amount;
        if($b->expense_class == "CO") $tt_co += $b->total_amount;
    }

}

$gms_total = $gms_ps + $gms_mooe + $gms_co;
$hrd_total = $hrd_ps + $hrd_mooe + $hrd_co;

$gas_ps = $gms_ps + $hrd_ps;
$gas_mooe = $gms_mooe + $hrd_mooe;
$gas_co = $gms_co + $hrd_co;
$gas_total = $gas_ps + $gas_mooe + $gas_co;

$rd_total = $rd_ps + $rd_mooe + $rd_co;
$st_total = $st_ps + $st_mooe + $st_co;
$tt_total = $tt_ps + $tt_mooe + $tt_co;

$ops_ps = $rd_ps + $st_ps + $tt_ps;
$ops_mooe = $rd_mooe + $st_mooe + $tt_mooe;
$ops_co = $rd_co + $st_co + $tt_co;
$ops_total = $ops_ps + $ops_mooe + $ops_co;

$total_ps = $gas_ps + $ops_ps;
$total_mooe = $gas_mooe + $ops_mooe;
$total_co = $gas_co + $ops_co;

$grand_total = $total_ps + $total_mooe + $total_co;

@endphp

<div class="card shadow">
<div class="card-body">

<table class="table table-bordered">

<thead class="table-dark">
<tr>
<th>Program / Activity</th>
<th>Personal Services</th>
<th>MOOE</th>
<th>Capital Outlay</th>
<th>Total</th>
</tr>
</thead>

<tbody>

<tr class="table-secondary">
<td colspan="5"><b>GENERAL ADMINISTRATION AND SUPPORT</b></td>
</tr>

<tr>
<td>General Management and Supervision</td>
<td>₱ {{ number_format($gms_ps,2) }}</td>
<td>₱ {{ number_format($gms_mooe,2) }}</td>
<td>₱ {{ number_format($gms_co,2) }}</td>
<td>₱ {{ number_format($gms_total,2) }}</td>
</tr>

<tr>
<td>Human Resource Development</td>
<td>₱ {{ number_format($hrd_ps,2) }}</td>
<td>₱ {{ number_format($hrd_mooe,2) }}</td>
<td>₱ {{ number_format($hrd_co,2) }}</td>
<td>₱ {{ number_format($hrd_total,2) }}</td>
</tr>

<tr style="font-weight:bold; background:#f5f5f5;">
<td>Sub Total - General Administration and Support</td>
<td>₱ {{ number_format($gas_ps,2) }}</td>
<td>₱ {{ number_format($gas_mooe,2) }}</td>
<td>₱ {{ number_format($gas_co,2) }}</td>
<td>₱ {{ number_format($gas_total,2) }}</td>
</tr>

<tr class="table-secondary">
<td colspan="5"><b>OPERATIONS</b></td>
</tr>

<tr>
<td>Textile R&D Program</td>
<td>₱ {{ number_format($rd_ps,2) }}</td>
<td>₱ {{ number_format($rd_mooe,2) }}</td>
<td>₱ {{ number_format($rd_co,2) }}</td>
<td>₱ {{ number_format($rd_total,2) }}</td>
</tr>

<tr>
<td>Textile S&T Services Program</td>
<td>₱ {{ number_format($st_ps,2) }}</td>
<td>₱ {{ number_format($st_mooe,2) }}</td>
<td>₱ {{ number_format($st_co,2) }}</td>
<td>₱ {{ number_format($st_total,2) }}</td>
</tr>

<tr>
<td>Textile Technology Transfer Program</td>
<td>₱ {{ number_format($tt_ps,2) }}</td>
<td>₱ {{ number_format($tt_mooe,2) }}</td>
<td>₱ {{ number_format($tt_co,2) }}</td>
<td>₱ {{ number_format($tt_total,2) }}</td>
</tr>

<tr style="font-weight:bold; background:#f5f5f5;">
<td>Sub Total - Operations</td>
<td>₱ {{ number_format($ops_ps,2) }}</td>
<td>₱ {{ number_format($ops_mooe,2) }}</td>
<td>₱ {{ number_format($ops_co,2) }}</td>
<td>₱ {{ number_format($ops_total,2) }}</td>
</tr>

<tr style="font-weight:bold; background:#eaeaea;">
<td>TOTAL</td>
<td>₱ {{ number_format($total_ps,2) }}</td>
<td>₱ {{ number_format($total_mooe,2) }}</td>
<td>₱ {{ number_format($total_co,2) }}</td>
<td>₱ {{ number_format($grand_total,2) }}</td>
</tr>

</tbody>

</table>

</div>
</div>

@endsection