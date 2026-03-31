<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\User;
use App\Repositories\Contracts\CartRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Validation\ValidationException;

class CartService
{
    protected $cartRepository;
    protected $productRepository;

    public function __construct(
        CartRepositoryInterface $cartRepository,
        ProductRepositoryInterface $productRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function getUserCart(User $user): Cart
    {
        $cart = $this->cartRepository->getOrCreateForUser($user);
        return $cart->load(['cartItems.product.category']);
    }

    public function addProductToCart(User $user, int $productId, int $quantity): void
    {
        $product = $this->productRepository->find($productId);

        if (!$product || $product->stock < $quantity) {
            throw ValidationException::withMessages([
                'product_id' => ['Product not available in requested quantity.'],
            ]);
        }

        $cart = $this->cartRepository->getOrCreateForUser($user);
        $this->cartRepository->addItem($cart, $productId, $quantity);
    }

    public function updateCartItem(User $user, int $itemId, int $quantity): void
    {
        $cart = $this->cartRepository->getOrCreateForUser($user);
        $this->cartRepository->updateItem($cart, $itemId, $quantity);
    }

    public function removeCartItem(User $user, int $itemId): void
    {
        $cart = $this->cartRepository->getOrCreateForUser($user);
        $this->cartRepository->removeItem($cart, $itemId);
    }

    public function clearCart(User $user): void
    {
        $cart = $this->cartRepository->getOrCreateForUser($user);
        $this->cartRepository->clear($cart);
    }
}
