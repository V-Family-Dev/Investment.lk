<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'property_type', 
        'location', 
        'price', 
        'description', 
        'property_images', 
        'video_tour_link',
    ];

    // Accessor for property_images to handle the JSON field
    public function getPropertyImagesAttribute($value)
    {
        return json_decode($value, true);
    }

    // Mutator for property_images to save as JSON
    public function setPropertyImagesAttribute($value)
    {
        $this->attributes['property_images'] = json_encode($value);
    }
}