<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

	 protected $fillable = [
        'id',
        'name',
        'price',
        'quantity',
        'cost',
    ];
    public $timestamps = false;
    
    public function product() {
        return $this->belongsTo(Product::class);
}
 }
