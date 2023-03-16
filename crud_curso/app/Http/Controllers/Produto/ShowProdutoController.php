<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShowProdutoController extends Controller

{
    function __invoke(Request $request, int $id): JsonResponse
    {

        /**
         * @param Request $request
         * @param int $id
         * @return JsonResponse
         */

        $product = Product::query()
            ->where('id', $id)
            ->first();

        if (!$product) {
            return $this->respondWithError("Not find product");
        }

        return $this->respondWithSuccess([
            'produto' => $product
        ]);
    }
}
