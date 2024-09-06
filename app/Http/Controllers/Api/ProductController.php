<?php

namespace App\Http\Controllers\Api;

use App\Filters\ProductPropertyFilter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\ProductFilterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{


    public function __construct(ProductFilterService $productFilterService)
    {
        $this->productFilterService = $productFilterService;
    }

    public function index(Request $request): JsonResponse
    {
        $filters = $request->get('properties', []);
        $products = $this->productFilterService->filter($filters);

        return response()->json($products);
    }

}
