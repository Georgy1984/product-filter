<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductFilterService
{
    public function filter(array $filters, int $perPage = 40): Collection
    {
        return Product::with('properties')
            ->filterByProperties($filters)
            ->take($perPage)
            ->get();
    }

}
