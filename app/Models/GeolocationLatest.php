<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

# Call Models
use App\Models\Users;

class GeolocationLatest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'battery_level',
        'status',
    ];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
