<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_rental extends Model
{
    use HasFactory;
    protected $table = 'room_rentals';

    protected $fillable = [
        'category_name',
        'title',
        'location',
        'rent_price',
        'size',
        'features',
        'description',
        'image_path',
        'contact_details',
    ];
}
