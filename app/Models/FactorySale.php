<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactorySale extends Model
{
    use HasFactory;
    protected $table = 'factory_sales';

    protected $fillable = [
        'title',
        'property_type',
        'location',
        'size',
        'price',
        'description',
        'image_path',
        'contact_details',
    ];
}
