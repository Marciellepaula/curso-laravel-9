<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreProdutoController extends Controller
{
    function __invoke(Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:2', 'max:100'],
            'description' => ['required', 'string', 'max:140']

        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ]);

        if (!$product) {
            return  $this->respondWithError("Error");
        }

        return $this->respondWithSuccess(
            [
                'product' => $product
            ],
            'Produto created successfully',
            201
        );
    }
}
