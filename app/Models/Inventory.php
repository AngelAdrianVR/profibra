<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'last_count_date',
        'product_id',
    ];

    protected $dates = [
        'last_count_date'
    ];

    //relationships
    
}
