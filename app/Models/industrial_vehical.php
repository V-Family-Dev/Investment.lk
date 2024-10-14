<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class industrial_vehical extends Model
{
    use HasFactory;
    protected $table = 'industrial_vehicals';

    protected $fillable = [
        'category_name',
        'vehical_name',
        'brand',
        'location',
        'condtion',
        'price',
        'description',
        'image_path',
        'model',
        'year',
        'fual_type',
        'mileage',
        'color',
        'engine_capacity',
        'bodytype',
        'edition',
        'transmisson',
    ];
}
