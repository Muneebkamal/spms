<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceSize extends Model
{
    protected $table = 'prices_sizes';
    protected $primaryKey = 'price_size_id';

    // Add your fillable attributes here
    protected $fillable = [
        'gross_sf',
        'net_sf',
        'selling_price',
        'selling_g',
        'selling_n',
        'rental_price',
        'rental_g',
        'rental_n',
        'mgmf',
        'rate',
        'land',
        'oths',
        'building_id',
    ];
}
