<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = ['quantity','order_id','product_id'];


    public function Order()
    {
        return $this->belongsTo(Order::class);
    }

    public function Product()
    {
        return $this->hasOne(Product::class,'id');
    }

    public function ProductColor()
    {
        return $this->hasOne(ProductColor::class,'id');
    }

    public function ProductSize()
    {
        return $this->hasOne(ProductSize::class,'id');
    }


}
