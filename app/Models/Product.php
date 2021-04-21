<?php

namespace App\Models;

use App\Scoping\Scoper;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeWithScopes($query, $scopes = [])
    {
        return (new Scoper(request()))->apply($query, $scopes);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
