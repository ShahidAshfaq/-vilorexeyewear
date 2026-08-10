<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional)
    protected $table = 'products';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'title',
        'description',
        'price',
        'sale_price',
        'sku',
        'stock',
        'category_id',
        'image',
        'status',
        'frame',
        'lens',
        'gender',
        'on_sale',
        'featured',
    ];


    // Optionally, you can define which attributes should be hidden or casted
    // protected $hidden = [];
    // protected $casts = [];
}
