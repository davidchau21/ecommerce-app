<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\CartRepositoryInterface;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class OrderService
{
    protected $orderRepository;
    protected $productRepository;
    protected $cartRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        ProductRepositoryInterface $productRepository,
        CartRepositoryInterface $cartRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->productRepository = $productRepository;
        $this->cartRepository = $cartRepository;
    }

    public function placeOrder(User $user, array $data): \App\Models\Order
    {
        $cart = $this->cartRepository->getOrCreateForUser($user)->load('cartItems.product');

        if ($cart->cartItems->isEmpty()) {
            throw ValidationException::withMessages([
                'cart' => ['Cart is empty.'],
            ]);
        }

        return DB::transaction(function () use ($user, $cart, $data) {
            $totalAmount = 0;
            $items = [];

            foreach ($cart->cartItems as $cartItem) {
                $product = $cartItem->product;

                if ($product->stock < $cartItem->quantity) {
                    throw ValidationException::withMessages([
                        'stock' => ["Product {$product->name} is out of stock."],
                    ]);
                }

                // Deduct stock
                $product->decrement('stock', $cartItem->quantity);

                $unitPrice = $product->price;
                $totalAmount += $unitPrice * $cartItem->quantity;

                $items[] = [
                    'product_id' => $product->id,
                    'quantity'   => $cartItem->quantity,
                    'unit_price' => $unitPrice,
                ];
            }

            $orderData = [
                'status'       => 'pending',
                'total_amount' => $totalAmount,
                'notes'        => $data['notes'] ?? null,
            ];

            $order = $this->orderRepository->createWithItems($user, $orderData, $items);

            // Clear cart after successful order
            $this->cartRepository->clear($cart);

            // Dispatch bonus job
            \App\Jobs\ProcessOrder::dispatch($order);

            return $order;
        });
    }

    public function getUserOrders(User $user, int $perPage = 15)
    {
        return $this->orderRepository->getUserOrders($user, $perPage);
    }

    public function getOrderDetails(int $id)
    {
        return $this->orderRepository->find($id);
    }
}
