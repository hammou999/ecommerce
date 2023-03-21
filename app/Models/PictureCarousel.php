<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureCarousel extends Model
{
    use HasFactory;

    protected $fillable = ['picture_url'];

}
