<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetDepartmentAllocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'budget_id',
        'department_id',
        'allocated_amount',
         'balance'
    ];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}