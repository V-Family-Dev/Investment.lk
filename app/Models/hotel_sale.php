<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel_sale extends Model
{
    use HasFactory;
    protected $table = 'hotel_sales';

    protected $fillable = [
        'title',
        'property_type',
        'size',
        'location',
        'property_features',
        'price',
        'description',
        'image_path',
        'contact_details'
    ];
}
