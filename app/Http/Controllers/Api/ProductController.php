<?php

namespace App\Http\Controllers\Api;

use App\Filters\ProductPropertyFilter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->get('properties', []);
        $products = Product::with('properties')
            ->filterByProperties($filters)
            ->paginate(40);

        return response()->json($products);
    }

}

















    //Попытка реализации фильтра средствами библиотеки Spatie

//    public function index()    {
//
//        $products = QueryBuilder::for(Product::class)
//            ->allowedFilters([
//
//                AllowedFilter::custom('properties', new ProductPropertyFilter()),
//            ])
//            ->get();
//
//        return response()->json($products);
//
//    }
