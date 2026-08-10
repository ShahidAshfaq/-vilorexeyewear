<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    // protected $fillable = ['name', 'image'];
     protected $fillable = [
        'name',
        'image',
        'phone',
        'email',
        'address',
        'city',
        'logo',
        'description',
        'facebook',
        'instagram',
        'whatsapp',
        'website',
    ];
}
