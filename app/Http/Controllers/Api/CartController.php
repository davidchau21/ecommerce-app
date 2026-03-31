<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Cart\AddToCartRequest;
use App\Http\Requests\Cart\UpdateCartRequest;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends BaseApiController
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request): JsonResponse
    {
        $cart = $this->cartService->getUserCart($request->user());
        return $this->successResponse($cart, 'Cart retrieved successfully.');
    }

    public function store(AddToCartRequest $request): JsonResponse
    {
        $this->cartService->addProductToCart(
            $request->user(),
            $request->product_id,
            $request->quantity
        );

        return $this->successResponse(null, 'Product added to cart successfully.', 201);
    }

    public function update(UpdateCartRequest $request, int $id): JsonResponse
    {
        $this->cartService->updateCartItem($request->user(), $id, $request->quantity);
        return $this->successResponse(null, 'Cart item updated successfully.');
    }

    public function destroy(Request $request, int $id): JsonResponse
    {
        $this->cartService->removeCartItem($request->user(), $id);
        return $this->successResponse(null, 'Cart item removed successfully.');
    }

    public function clear(Request $request): JsonResponse
    {
        $this->cartService->clearCart($request->user());
        return $this->successResponse(null, 'Cart cleared successfully.');
    }
}
