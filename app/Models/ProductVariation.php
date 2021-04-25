<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type()
    {
        return $this->hasOne(ProductVariationType::class, 'id', 'product_variations_type_id');
    }
}
