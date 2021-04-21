<?php

namespace App\Scoping\Scopes;

class CategoryScope
{
    public function apply($query, $value)
    {
        //dd($value);
        return $query->whereHas('categories', function($query) use ($value) {
            $query->where('slug', $value);
        });
    }
}