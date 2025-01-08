<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    protected $fillable = ['title', 'author', 'content', 'category_id', 'image', 'tags'];

    public function category(): HasOne
    {
        return $this->HasOne(Category::class, 'id', 'category_id');
    }
}
