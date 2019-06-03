<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'code',
        'price',
        'availability',
        'brand',
        'image',
        'description',
        'is_new',
        'is_recommended',
        'status'
    ];
}
