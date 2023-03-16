<?php

namespace App\Support;

use Illuminate\Http\JsonResponse;

trait DefaultResponseApi
{
    /**
     * @param array $data
     * @param string|null $message
     * @param int $status
     * @return JsonResponse
     */
    public function respondWithSuccess(array $data = [], string $message = null, int $status = 200): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * @param mixed $data
     * @return JsonResponse
     */
    public function respondWithPaginate(mixed $data = []): JsonResponse
    {
        return response()->json($data);
    }

    /**
     * @param string|null $message
     * @param int $status
     * @return JsonResponse
     */
    public function respondWithSuccessWithoutData(string $message = null, int $status = 200): JsonResponse
    {
        return $this->respondWithSuccess([], $message, $status);
    }

    /**
     * @param string|null $message
     * @param int $status
     * @param array $data
     * @return JsonResponse
     */
    public function respondWithError(string $message = null, int $status = 400, array $data = []): JsonResponse
    {
        return response()->json(array_merge([
            'message' => $message,
        ], $data), $status);
    }
}
