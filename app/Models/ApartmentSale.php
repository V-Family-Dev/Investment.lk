<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentSale extends Model
{
    use HasFactory;
    protected $table = 'apartment_sales';

    protected $fillable = [
        'title',
        'bedrooms',
        'bathrooms',
        'location',
        'size',
        'price',
        'description',
        'image_path',
        'contact_details'
    ];
}
