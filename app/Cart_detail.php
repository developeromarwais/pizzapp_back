<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_detail extends Model
{
    protected $fillable = ['quantity', 'describtion', 'cartId', 'pizzaId'];
}
