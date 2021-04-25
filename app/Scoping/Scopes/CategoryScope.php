<?php

namespace App\Scoping\Scopes;

class CategoryScope
{
    public function apply($query, $value)
    {
        if($value) {
            return $query->whereHas('categories', function($query) use ($value) {
                $query->where('slug', $value);
            });
        }

        return;
    }
}