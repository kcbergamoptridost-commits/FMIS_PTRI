<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    protected $fillable = [
    'fiscal_year',
    'program_name',
    'category',
    'personal_services',
    'mooe',
    'capital_outlay',
    'total'
];
}
