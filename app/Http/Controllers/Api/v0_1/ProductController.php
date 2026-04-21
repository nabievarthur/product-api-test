<?php

namespace App\Http\Controllers\Api\v0_1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(IndexRequest $request)
    {
        $filters = $request->validated();
        return ProductResource::collection(
            Product::filter($filters)
                ->with('category')
                ->paginate(5)
        )->resolve();
    }

}
