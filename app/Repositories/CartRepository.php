<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\User;
use App\Repositories\Contracts\CartRepositoryInterface;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    public function __construct(Cart $model)
    {
        parent::__construct($model);
    }

    public function getOrCreateForUser(User $user): Cart
    {
        return $this->model->firstOrCreate(['user_id' => $user->id]);
    }

    public function addItem(Cart $cart, int $productId, int $quantity): void
    {
        $item = $cart->cartItems()->where('product_id', $productId)->first();

        if ($item) {
            $item->increment('quantity', $quantity);
        } else {
            $cart->cartItems()->create([
                'product_id' => $productId,
                'quantity'   => $quantity,
            ]);
        }
    }

    public function updateItem(Cart $cart, int $itemId, int $quantity): void
    {
        $cart->cartItems()->where('id', $itemId)->update(['quantity' => $quantity]);
    }

    public function removeItem(Cart $cart, int $itemId): void
    {
        $cart->cartItems()->where('id', $itemId)->delete();
    }

    public function clear(Cart $cart): void
    {
        $cart->cartItems()->delete();
    }
}
