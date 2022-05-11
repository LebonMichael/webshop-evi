<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDetails extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function color(){
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function clothSize(){
        return $this->belongsTo(ClothSizes::class, 'clothSize_id');
    }

    public function discount(){
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function images(){
        return $this->hasMany(Image::class, 'product_details_id');
    }

}
