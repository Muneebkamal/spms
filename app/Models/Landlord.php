<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    protected $table = 'landlord_details';
    protected $primaryKey = 'landlord_id';
    public $timestamps = false;

    protected $fillable = [
        'landlord_name',
        'bank',
        'bank_acc',
        'remarks',
        'code',
        'landlord_created_at',
        'contact1',
        'number1',
        'contact2',
        'number2',
        'contact3',
        'number3',
    ];
}
