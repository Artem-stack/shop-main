<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

     public function items() {
    return $this->hasMany(OrderItem::class);
}

	protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'address',
        'comment',
        'amount',
    ];
}
    