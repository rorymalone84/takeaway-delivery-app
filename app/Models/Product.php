<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','category_id','description','ingredients','price','image','user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders(){

        return $this->belongsToMany(Order::class);
    }
}