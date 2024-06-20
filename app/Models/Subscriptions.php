<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'monthly_fee', 'annual_fee', 'monthly_annual_fee', 'description', 'features',
    ];

    protected $casts = [
        'features' => 'json', // Cast 'features' attribute to JSON
    ];
}
