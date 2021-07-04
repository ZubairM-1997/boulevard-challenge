<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
    [
        'name',
        'SKU',
        'COG',
        'price',
        'length',
        'width',
        'height',
        'weight',
        'FDW_SKU',
        'colour_0',
        'colour_1',
        'colour_2',
        'ASIN_UK',
        'ASIN_CA',
        'ASIN_US',
        'ASIN_FR',
        'ASIN_DE',
        'ASIN_ES',
        'ASIN_IT',
        'ASIN_NL',
        'ASIN_SE',
    ];
}
