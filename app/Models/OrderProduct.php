<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'order_product';

    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}