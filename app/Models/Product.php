<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
            'name',
            'description',
            'slug',
            'image',
            'price',
            'quantity',
            'is_active',
            'category_id',
            'brand_id'
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function category()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }
}
