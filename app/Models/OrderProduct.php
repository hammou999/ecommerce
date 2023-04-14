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
        return $this->belongsTo(Product::class,'product_id');
    }

    public function ProductType()
    {
        return $this->belongsTo(ProductType::class,'type_id');
    }
    public function ProductColor()
    {
        return $this->belongsTo(ProductColor::class,'color_id');
    }

    public function ProductSize()
    {
        return $this->belongsTo(ProductSize::class,'size_id');
    }


}
