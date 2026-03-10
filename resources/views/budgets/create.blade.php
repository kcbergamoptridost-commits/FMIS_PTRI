@extends('layouts.app')

@section('content')
<a href="{{ route('dashboard') }}" class="btn btn-light mb-3">
    <i class="bi bi-arrow-left"></i> Back to Dashboard
</a>
<div class="container">
    <h3 class="mb-4">Create Budget - Regular Programs</h3>

<form method="POST" action="{{ route('budgets.store') }}">
@csrf

<div class="mb-3">
    <label class="form-label">Fiscal Year</label>
    <input type="text" name="fiscal_year" class="form-control" maxlength="4" placeholder="Enter fiscal year (e.g. 2026)" required>
</div>

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
<td colspan="5"><strong>GENERAL ADMINISTRATION AND SUPPORT</strong></td>
</tr>

<tr>
<td>General Management and Supervision</td>
<td><input type="number" step="0.01" name="gms_ps" class="form-control calc"></td>
<td><input type="number" step="0.01" name="gms_mooe" class="form-control calc"></td>
<td><input type="number" step="0.01" name="gms_co" class="form-control calc"></td>
<td><input type="text" name="gms_total" class="form-control total" readonly></td>
</tr>

<tr>
<td>Human Resource Development</td>
<td><input type="number" step="0.01" name="hrd_ps" class="form-control calc"></td>
<td><input type="number" step="0.01" name="hrd_mooe" class="form-control calc"></td>
<td><input type="number" step="0.01" name="hrd_co" class="form-control calc"></td>
<td><input type="text" name="hrd_total" class="form-control total" readonly></td>
</tr>

<tr class="table-light">
<td><b>Sub Total - General Administration and Support</b></td>
<td id="gas_ps">0</td>
<td id="gas_mooe">0</td>
<td id="gas_co">0</td>
<td id="gas_total">0</td>
</tr>


<tr class="table-secondary">
<td colspan="5"><strong>OPERATIONS</strong></td>
</tr>

<tr>
<td>Textile and Other Textile Related R&D Program</td>
<td><input type="number" step="0.01" name="rd_ps" class="form-control calc"></td>
<td><input type="number" step="0.01" name="rd_mooe" class="form-control calc"></td>
<td><input type="number" step="0.01" name="rd_co" class="form-control calc"></td>
<td><input type="text" name="rd_total" class="form-control total" readonly></td>
</tr>

<tr>
<td>Textile S&T Services Program</td>
<td><input type="number" step="0.01" name="st_ps" class="form-control calc"></td>
<td><input type="number" step="0.01" name="st_mooe" class="form-control calc"></td>
<td><input type="number" step="0.01" name="st_co" class="form-control calc"></td>
<td><input type="text" name="st_total" class="form-control total" readonly></td>
</tr>

<tr>
<td>Textile Technology Transfer Program</td>
<td><input type="number" step="0.01" name="tt_ps" class="form-control calc"></td>
<td><input type="number" step="0.01" name="tt_mooe" class="form-control calc"></td>
<td><input type="number" step="0.01" name="tt_co" class="form-control calc"></td>
<td><input type="text" name="tt_total" class="form-control total" readonly></td>
</tr>

<tr class="table-light">
<td><b>Sub Total - Operations</b></td>
<td id="ops_ps">0</td>
<td id="ops_mooe">0</td>
<td id="ops_co">0</td>
<td id="ops_total">0</td>
</tr>

<!-- <tr class="table-light">
<td><strong>Sub Total - Operations</strong></td>
<td id="ops_ps"></td>
<td id="ops_mooe"></td>
<td id="ops_co"></td>
<td id="ops_total"></td>
</tr> -->

<tr class="table-dark">
<td><strong>TOTAL REGULAR PROGRAMS</strong></td>
<td id="total_ps"></td>
<td id="total_mooe"></td>
<td id="total_co"></td>
<td id="grand_total"></td>
</tr>

</tbody>
</table>

<div class="mt-3">

    <button type="submit" class="btn btn-primary">
        Save Budget
    </button>

    <a href="{{ route('budgets.index') }}" class="btn btn-secondary">
        Cancel
    </a>

</div>

</form>
</div>

<script>

document.querySelectorAll('.calc').forEach(input => {
    input.addEventListener('input', calculateTotals);
});

function calculateTotals(){

    let gas_ps = 0, gas_mooe = 0, gas_co = 0;
    let ops_ps = 0, ops_mooe = 0, ops_co = 0;

    document.querySelectorAll('tbody tr').forEach(row => {

        let inputs = row.querySelectorAll('.calc');

        if(inputs.length === 3){

            let ps = parseFloat(inputs[0].value) || 0;
            let mooe = parseFloat(inputs[1].value) || 0;
            let co = parseFloat(inputs[2].value) || 0;

            let total = ps + mooe + co;

            row.querySelector('.total').value = total.toFixed(2);

            if(row.innerText.includes("General") || row.innerText.includes("Human")){
                gas_ps += ps;
                gas_mooe += mooe;
                gas_co += co;
            }else{
                ops_ps += ps;
                ops_mooe += mooe;
                ops_co += co;
            }

        }

    });

    let gas_total = gas_ps + gas_mooe + gas_co;
    let ops_total = ops_ps + ops_mooe + ops_co;

    document.getElementById('gas_ps').innerText = gas_ps.toFixed(2);
    document.getElementById('gas_mooe').innerText = gas_mooe.toFixed(2);
    document.getElementById('gas_co').innerText = gas_co.toFixed(2);
    document.getElementById('gas_total').innerText = gas_total.toFixed(2);

    document.getElementById('ops_ps').innerText = ops_ps.toFixed(2);
    document.getElementById('ops_mooe').innerText = ops_mooe.toFixed(2);
    document.getElementById('ops_co').innerText = ops_co.toFixed(2);
    document.getElementById('ops_total').innerText = ops_total.toFixed(2);

    let total_ps = gas_ps + ops_ps;
    let total_mooe = gas_mooe + ops_mooe;
    let total_co = gas_co + ops_co;
    let grand_total = total_ps + total_mooe + total_co;

    document.getElementById('total_ps').innerText = total_ps.toFixed(2);
    document.getElementById('total_mooe').innerText = total_mooe.toFixed(2);
    document.getElementById('total_co').innerText = total_co.toFixed(2);
    document.getElementById('grand_total').innerText = grand_total.toFixed(2);

}

</script>
@endsection