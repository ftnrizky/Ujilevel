<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'username', 'phone', 'gender',
        'province', 'city', 'district', 'postal_code', 'profile_image'
    ];    
}
