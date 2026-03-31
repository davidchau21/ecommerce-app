<?php

namespace App\Repositories\Contracts;

use App\Models\Cart;
use App\Models\User;

interface CartRepositoryInterface
{
    public function getOrCreateForUser(User $user): Cart;
    public function addItem(Cart $cart, int $productId, int $quantity): void;
    public function updateItem(Cart $cart, int $itemId, int $quantity): void;
    public function removeItem(Cart $cart, int $itemId): void;
    public function clear(Cart $cart): void;
}
