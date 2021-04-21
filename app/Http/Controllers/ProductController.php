<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Scoping\Scopes\CategoryScope;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductIndexResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withScopes($this->scopes())->get();
        return ProductIndexResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function scopes()
    {
        return [
            'category' => new CategoryScope()
        ];
    }
}
