<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Land_sale extends Model
{
    use HasFactory;
    protected $table = 'land_sales';

    protected $fillable = [
        'title',
        'land_type',
        'land_size',
        'location',
        'price',
        'description',
        'image_path',
        'contact_details'
    ];
}
