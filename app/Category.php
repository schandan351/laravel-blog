<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $rules = [
        'category' => 'sometimes|required|unique:categories',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
