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

        $query = Product::query();


        $query->when($request->has('search'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->query('search') . '%');
        });


        $products = $query
            ->paginate($request->query('per_page', 10))
            ->withQueryString();

        return $this->respondWithPaginate($products);
    }
}
