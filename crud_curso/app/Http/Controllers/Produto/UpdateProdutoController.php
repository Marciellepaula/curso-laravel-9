<?php

namespace App\Http\Controllers\Produto;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateProdutoController extends Controller
{
    function __invoke(Request $request, $id): JsonResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:2', 'max:100'],
            'description' => ['required', 'string', '100']
        ]);


        $producto = Product::query()->where('id', $id)->first();


        if (!$producto) {
            return $this->respondWithError('Campaign not found');
        }

        $producto->fill([
            'name' => $request->input(),
            'price' => $request->input(),
            'description' => $request->input(),

        ]);

        if (!$producto->save()) {
            return $this->respondWithError('Not work');
        }

        return $this->respondWithSuccess([
            'campaign' => $producto,
        ], 'campaign updated successfully');
    }
}
