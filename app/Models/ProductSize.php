<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    protected $fillable = ['title','price','product_id'];

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }

}
