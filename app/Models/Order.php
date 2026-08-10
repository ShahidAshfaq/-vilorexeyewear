<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

   protected $fillable = [
    'user_id',
    'session_id',
    'order_number',
    'name',
    'email',
    'phone',
    'city',
    'address',
    'payment_method',
    'coupon_code',
    'discount',
    'total',
    'status',
    'items',
];

    protected $casts = [
        'items' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
