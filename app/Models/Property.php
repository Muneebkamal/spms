<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    protected $primaryKey = 'building_id';
    public $timestamps = false;

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
        'building_created_at',

        'landlord_name',
        'bank',
        'bank_acc',
        'remarks',
        'landlord_created_at',
        'contact1',
        'number1',
        'contact2',
        'number2',
        'contact3',
        'number3',

        'facilities',
        'types',
        'decorations',
        'others',
        'other_date',
        'other_free_formate',

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
    ];

    public function photos()
    {
        return $this->hasMany(Photo::class, 'code', 'code');
    }

    public function singlephoto()
    {
        return $this->hasOne(Photo::class, 'code', 'code');
    }
}
