<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    use HasFactory;
    public function customers()
    {
        return $this->belongsTo(Customers::class, 'id', 'price_id');
    }
}
