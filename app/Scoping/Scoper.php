<?php

namespace App\Scoping;

use Illuminate\Http\Request;

class Scoper
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($query, array $scopes)
    {
        foreach ($scopes as $key => $scope) {
            $scope->apply($query, $this->request->get($key));
        }

        return $query;
    }
}