<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $fillable = [
        'name',
        'image'
    ];
}
