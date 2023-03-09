<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'presentation',
        'max_quantity',
        'min_quantity',
        'supply_point',
        'cost',
        'product_type',
    ];

    //relationships
}
