<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_manage extends Model
{
    use HasFactory;
    protected $table = 'property_manages';

    protected $fillable = [
        'category_name',
        'property_id',
        'user_id',
        'status',
        'ads_payment_id',
        'ads_payment_status',
        'active_or_not'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
