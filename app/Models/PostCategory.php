<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory;
    use softDeletes;

    protected $guarded = ['id'];

    public function posts(){
        return $this->belongsToMany(Post::class, 'category_post');
    }
}
