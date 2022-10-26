<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    public function branch()
    {
        return $this->belongsTo(Branches::class, 'branch_id', 'id');
    }
}
