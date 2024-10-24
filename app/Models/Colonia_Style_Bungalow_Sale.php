<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colonia_Style_Bungalow_Sale extends Model
{
    use HasFactory;
    protected $table = 'colonia__style__bungalow__sales';

    protected $fillable = [
        'title',
        'bedrooms',
        'bathrooms',
        'location',
        'house_size',
        'land_size',
        'price',
        'description',
        'image_path',
        'contact_details'
    ];
}
