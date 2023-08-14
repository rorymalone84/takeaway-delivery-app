<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_address',
        'customer_city',
        'customer_email',
        'customer_phone',
        'delivery_price',
        'total_price',
        'store_id',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['quantity']);
    }

}