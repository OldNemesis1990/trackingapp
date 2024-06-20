<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_holder_id', 'subscription_id', 'payment_duration_period', 'complimentary',
    ];

    public function profileUsers()
    {
        return $this->hasMany(User::class);
    }
}
