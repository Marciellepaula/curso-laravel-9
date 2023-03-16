<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IndexProdutoController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    function  __invoke(Request $request): JsonResponse
    {

        $query = Product::query()->select('name', 'price');

        $products = $query->get(); // retrieve all matching products

        return $this->respondWithPaginate($products);
    }
}
