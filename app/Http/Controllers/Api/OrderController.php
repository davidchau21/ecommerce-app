<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Order\PlaceOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends BaseApiController
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request): JsonResponse
    {
        $orders = $this->orderService->getUserOrders($request->user(), $request->get('per_page', 15));
        return $this->paginatedResponse($orders, 'Orders retrieved successfully.');
    }

    public function store(PlaceOrderRequest $request): JsonResponse
    {
        $order = $this->orderService->placeOrder($request->user(), $request->validated());
        return $this->successResponse($order, 'Order placed successfully.', 201);
    }

    public function show(int $id): JsonResponse
    {
        $order = $this->orderService->getOrderDetails($id);
        if (!$order) {
            return $this->errorResponse('Order not found.', 404);
        }
        return $this->successResponse($order, 'Order retrieved successfully.');
    }
}
