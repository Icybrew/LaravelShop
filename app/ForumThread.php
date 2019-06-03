<?php

namespace shop;

use Illuminate\Database\Eloquent\Model;

class ForumThread extends Model
{
    protected $fillable = [
        'user_id',
        'forum_id',
        'name',
        'content'
    ];
}
