<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'building_infoes';
    protected $primaryKey = 'building_id';
    public $timestamps = false;

    // Add your fillable attributes here
    protected $fillable = [
        'code',
        'district',
        'street',
        'building',
        'floor',
        'flat',
        'no_room',
        'enter_password',
        'block',
        'cargo_lift',
        'customer_lift',
        'tf_hr',
        'display_by',
        'individual',
        'separate',
        'year',
        'agent_name',
        'building_created_at'
    ];
}
