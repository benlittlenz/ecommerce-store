<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type()
    {
        return $this->hasOne(ProductVariationType::class, 'id', 'product_variations_type_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
