<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    public function employees()
    {
        return $this->belongsTo(Employees::class, 'employee_id', 'id');
    }
    public function prices()
    {
        return $this->belongsTo(Prices::class, 'price_id', 'id');
    }
}
