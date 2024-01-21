<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ftod extends Model
{
    protected $table = 'ftods';
    protected $primaryKey = 'ftdo_id';
    public $timestamps = false;

    // Add your fillable attributes here
    protected $fillable = [
        'facilities',
        'types',
        'decorations',
        'others',
        'other_date',
        'other_free_formate',
        'building_id',
    ];
}
