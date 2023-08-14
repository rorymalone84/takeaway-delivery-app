<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id'];

    public function products(){
        return $this->hasMany(Product::class, 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
