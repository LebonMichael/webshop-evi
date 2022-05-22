<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];


    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function productCategory(){
        return $this->belongsTo(ProductCategory::class);
    }
    public function gender(){
        return $this->belongsTo(Gender::class);
    }
    public function photo(){
        return $this->belongsTo(Photo::class,'photo_id');
    }
    public function discount(){
        return $this->belongsTo(Discount::class);
    }

    public function productDetails(){
        return $this->belongsToMany(Product::class, 'product_details');
    }
    public function colors(){
        return $this->belongsToMany(Color::class, 'product_colors');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('name', 'like', '%' . request('search') . '%')
                ->where('price', 'like', '%' . request('search') . '%')
                ->orWhere('stock', 'like', '%' . request('search') . '%')
                ->orWhereHas('colors', function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                });
        }
    }

}
