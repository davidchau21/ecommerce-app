<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Services\CartService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    protected $cartService;
    protected $productService;

    public function __construct(CartService $cartService, ProductService $productService)
    {
        $this->cartService = $cartService;
        $this->productService = $productService;
    }

    public function home()
    {
        return Inertia::render('Home', [
            'featuredProducts' => Product::with('category')->where('is_active', true)->limit(3)->get(),
            'categories' => Category::all(),
        ]);
    }

    public function productsIndex(Request $request)
    {
        $products = Product::with('category')
            ->where('is_active', true)
            ->when($request->category, function ($query, $category) {
                return $query->whereHas('category', fn($q) => $q->where('slug', $category));
            })
            ->paginate(12);

        return Inertia::render('Products/Index', [
            'products' => $products,
            'categories' => Category::all(),
        ]);
    }

    public function productsShow($id)
    {
        return Inertia::render('Products/Show', [
            'product' => Product::with('category')->findOrFail($id),
        ]);
    }

    public function cart()
    {
        $cart = $this->cartService->getUserCart(auth()->user());
        return Inertia::render('Cart', [
            'cartItems' => $cart->cartItems,
            'total' => $cart->cartItems->sum(fn($item) => $item->quantity * $item->product->price),
        ]);
    }

    public function checkout()
    {
        $cart = $this->cartService->getUserCart(auth()->user());
        return Inertia::render('Checkout', [
            'cartItems' => $cart->cartItems,
            'total' => $cart->cartItems->sum(fn($item) => $item->quantity * $item->product->price),
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $this->cartService->addProductToCart(auth()->user(), $request->product_id, $request->quantity);

        return back()->with('success', 'Product added to cart.');
    }

    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $this->cartService->updateCartItem(auth()->user(), $id, $request->quantity);

        return back()->with('success', 'Cart updated.');
    }

    public function removeFromCart($id)
    {
        $this->cartService->removeCartItem(auth()->user(), $id);

        return back()->with('success', 'Item removed from cart.');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        try {
            $order = app(\App\Services\OrderService::class)->placeOrder(auth()->user(), $request->all());
            return redirect()->route('dashboard')->with('success', 'Order placed successfully! ID: ' . $order->id);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
