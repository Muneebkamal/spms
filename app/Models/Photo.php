<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $primaryKey = 'image_id';
    public $timestamps = false;

    protected $fillable = [
        'image',
        'code',
        'image_created_at',
        'room_number',
        'image_watermark',
        'image_resized',
        'size',
        'price',
        'saved'
    ];

}
