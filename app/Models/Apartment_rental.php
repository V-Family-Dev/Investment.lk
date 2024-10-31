<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment_rental extends Model
{
    use HasFactory;
    protected $table = 'apartment_rentals';

    protected $fillable = [
        'category_name', 
        'title', 
        'location', 
        'rent_price', 
        'size', 
        'features', 
        'description', 
        'image_path', 
        'contact_details'
    ];
}
