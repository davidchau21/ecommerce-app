<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponseTrait
{
    /**
     * Success Response
     *
     * @param mixed $data
     * @param string|null $message
     * @param int $code
     * @return JsonResponse
     */
    protected function successResponse($data, ?string $message = null, int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    /**
     * Error Response
     *
     * @param string $message
     * @param int $code
     * @param mixed $errors
     * @return JsonResponse
     */
    protected function errorResponse(string $message, int $code = Response::HTTP_BAD_REQUEST, $errors = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }

    /**
     * Paginated Response
     *
     * @param mixed $paginatedData
     * @param string|null $message
     * @return JsonResponse
     */
    protected function paginatedResponse($paginatedData, ?string $message = null): JsonResponse
    {
        $data = $paginatedData->toArray();
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data['data'],
            'meta'    => [
                'current_page' => $data['current_page'],
                'last_page'    => $data['last_page'],
                'per_page'     => $data['per_page'],
                'total'        => $data['total'],
            ],
        ], Response::HTTP_OK);
    }
}
