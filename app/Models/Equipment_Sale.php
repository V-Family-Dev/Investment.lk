<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment_Sale extends Model
{
    use HasFactory;
    protected $table = 'equipment_sales';
    protected $fillable = [
        'category_name',
        'title',
        'brand',
        'location',
        'price',
        'description',
        'image_path',
        'contact_details',
    ];
}
