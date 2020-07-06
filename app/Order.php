<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['cartId', 'name', 'address', 'surname', 'userId', 'total_price'];
}
