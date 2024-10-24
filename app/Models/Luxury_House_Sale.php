<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luxury_House_Sale extends Model
{
    use HasFactory;

    protected $table = 'luxury__house__sales';

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
