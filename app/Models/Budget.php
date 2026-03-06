<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'fiscal_year',
        'expense_class',
        'program',
        'total_amount',
        'description',
        'proposed_by',
        'status',
        'gms_ps','gms_mooe','gms_co',
        'hrd_ps','hrd_mooe','hrd_co',
        'rd_ps','rd_mooe','rd_co',
        'st_ps','st_mooe','st_co',
        'tt_ps','tt_mooe','tt_co'
];
}