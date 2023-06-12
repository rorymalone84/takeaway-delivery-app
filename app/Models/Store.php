<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address_line_1','address_line_2', 'city','phone', 'postcode', 'delivery_cost'];

    public function users(){
        return $this->hasMany(User::class, 'store_id');
    }

}