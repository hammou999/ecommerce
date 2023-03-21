<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['full_name','phone','address','status','commune_id','product_id'];

    public function OrderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function Wilaya()
    {
        return $this->belongsTo(AlgeriaCitie::class);
    }

    public function Commune()
    {
        return $this->belongsTo(AlgeriaCitie::class,'commune_id');
    }

}
