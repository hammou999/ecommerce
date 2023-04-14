<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','price','old_price','url_picture'];

    public function ProductColor()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function ProductSize()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function ProductPicture()
    {
        return $this->hasMany(ProductPicture::class);
    }

    public function ProductType()
    {
        return $this->hasMany(ProductType::class);
    }

}
