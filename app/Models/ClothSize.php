<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothSize extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_cloth_size');
    }

}
