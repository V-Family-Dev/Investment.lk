<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantation_sale extends Model
{
    use HasFactory;
    protected $table = 'plantation_sales';

    protected $fillable = [
        'title',
        'plantation_type',
        'size',
        'location',
        'price',
        'description',
        'image_path',
        'contact_details',
    ];
}
