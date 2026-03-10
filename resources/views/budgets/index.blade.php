@extends('layouts.app')

@section('content')

<h3 class="mb-4">Budget Summary</h3>


<div class="d-flex gap-2 mb-3">

    <a href="{{ route('setBudget') }}" class="btn btn-success">
        Set Total Budget
    </a>


@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

 <a href="{{ route('budgets.create') }}" class="btn btn-primary">
        + Create Budget
    </a>

</div>

<?php

$gms_ps = $gms_mooe = $gms_co = 0;
$hrd_ps = $hrd_mooe = $hrd_co = 0;

$rd_ps = $rd_mooe = $rd_co = 0;
$st_ps = $st_mooe = $st_co = 0;
$tt_ps = $tt_mooe = $tt_co = 0;

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

?>

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

<div class="row mb-4">

    <!-- Total Budget -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Total Budget (Admin Input)</h6>
                <h3 class="fw-bold text-primary">
                    ₱ {{ number_format($totalBudgetInput ?? 0,2) }}
                </h3>
            </div>
        </div>
    </div>

    <!-- Total Programs -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Total Regular Programs</h6>
                <h3 class="fw-bold text-success">
                    ₱ {{ number_format($totalPrograms ?? 0,2) }}
                </h3>
            </div>
        </div>
    </div>

    <!-- Remaining -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Remaining Budget</h6>
                <h3 class="fw-bold text-danger">
                    ₱ {{ number_format($remainingBudget ?? 0,2) }}
                </h3>
            </div>
        </div>
    </div>

</div>

<tbody>

<tr class="table-secondary">
<td colspan="5"><b>GENERAL ADMINISTRATION AND SUPPORT</b></td>
</tr>

<tr>
<td>General Management and Supervision</td>
<td>₱ {{ number_format($gms->ps ?? 0,2) }}</td>
<td>₱ {{ number_format($gms->mooe ?? 0,2) }}</td>
<td>₱ {{ number_format($gms->co ?? 0,2) }}</td>
<td>₱ {{ number_format(($gms->ps ?? 0)+($gms->mooe ?? 0)+($gms->co ?? 0),2) }}</td>
</tr>

<tr>
<td>Human Resource Development</td>
<td>₱ {{ number_format($hrd->ps ?? 0,2) }}</td>
<td>₱ {{ number_format($hrd->mooe ?? 0,2) }}</td>
<td>₱ {{ number_format($hrd->co ?? 0,2) }}</td>
<td>₱ {{ number_format(($hrd->ps ?? 0)+($hrd->mooe ?? 0)+($hrd->co ?? 0),2) }}</td>
</tr>

@php
$gas_ps = ($gms->ps ?? 0) + ($hrd->ps ?? 0);
$gas_mooe = ($gms->mooe ?? 0) + ($hrd->mooe ?? 0);
$gas_co = ($gms->co ?? 0) + ($hrd->co ?? 0);
$gas_total = $gas_ps + $gas_mooe + $gas_co;
@endphp

<tr style="font-weight:bold; background:#f5f5f5;">
<td>Sub Total - General Administration and Support</td>
<td><strong>₱ {{ number_format($gas_ps,2) }}</strong></td>
<td><strong>₱ {{ number_format($gas_mooe,2) }}</strong></td>
<td><strong>₱ {{ number_format($gas_co,2) }}</strong></td>
<td><strong>₱ {{ number_format($gas_total,2) }}</strong></td>
</tr>

<tr class="table-secondary">
<td colspan="5"><b>OPERATIONS</b></td>
</tr>

<tr>
<td>Textile R&D Program</td>
<td>₱ {{ number_format($rd->ps ?? 0,2) }}</td>
<td>₱ {{ number_format($rd->mooe ?? 0,2) }}</td>
<td>₱ {{ number_format($rd->co ?? 0,2) }}</td>
<td>₱ {{ number_format(($rd->ps ?? 0)+($rd->mooe ?? 0)+($rd->co ?? 0),2) }}</td>
</tr>

<tr>
<td>Textile S&T Services Program</td>
<td>₱ {{ number_format($st->ps ?? 0,2) }}</td>
<td>₱ {{ number_format($st->mooe ?? 0,2) }}</td>
<td>₱ {{ number_format($st->co ?? 0,2) }}</td>
<td>₱ {{ number_format(($st->ps ?? 0)+($st->mooe ?? 0)+($st->co ?? 0),2) }}</td>
</tr>

<tr>
<td>Textile Technology Transfer Program</td>
<td>₱ {{ number_format($tt->ps ?? 0,2) }}</td>
<td>₱ {{ number_format($tt->mooe ?? 0,2) }}</td>
<td>₱ {{ number_format($tt->co ?? 0,2) }}</td>
<td>₱ {{ number_format(($tt->ps ?? 0)+($tt->mooe ?? 0)+($tt->co ?? 0),2) }}</td>
</tr>

@php
$ops_ps = ($rd->ps ?? 0) + ($st->ps ?? 0) + ($tt->ps ?? 0);
$ops_mooe = ($rd->mooe ?? 0) + ($st->mooe ?? 0) + ($tt->mooe ?? 0);
$ops_co = ($rd->co ?? 0) + ($st->co ?? 0) + ($tt->co ?? 0);
$ops_total = $ops_ps + $ops_mooe + $ops_co;
@endphp

<tr style="font-weight:bold; background:#f5f5f5;">
<td>Sub Total - Operations</td>
<td><strong>₱ {{ number_format($ops_ps,2) }}</strong></td>
<td><strong>₱ {{ number_format($ops_mooe,2) }}</strong></td>
<td><strong>₱ {{ number_format($ops_co,2) }}</strong></td>
<td><strong>₱ {{ number_format($ops_total,2) }}</strong></td>
</tr>

@php
$grand_ps = $gas_ps + $ops_ps;
$grand_mooe = $gas_mooe + $ops_mooe;
$grand_co = $gas_co + $ops_co;
$grand_total = $grand_ps + $grand_mooe + $grand_co;
@endphp

<tr style="font-weight:bold; background:#eaeaea;">
<td>TOTAL</td>
<td><strong>₱ {{ number_format($grand_ps,2) }}</strong></td>
<td><strong>₱ {{ number_format($grand_mooe,2) }}</strong></td>
<td><strong>₱ {{ number_format($grand_co,2) }}</strong></td>
<td><strong>₱ {{ number_format($grand_total,2) }}</strong></td>
</tr>

</tbody>

</table>

</div>
</div>


@endsection