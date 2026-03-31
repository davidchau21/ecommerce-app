<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'revenue' => 12840,
                'orders' => 156,
                'customers' => 892,
                'products' => Product::count(),
            ],
            'recentOrders' => [] // Mock for now
        ]);
    }

    public function productsIndex()
    {
        return Inertia::render('Admin/Products/Index', [
            'products' => Product::with('category')->latest()->paginate(10),
        ]);
    }

    public function productsCreate()
    {
        return Inertia::render('Admin/Products/Create', [
            'categories' => Category::all(),
        ]);
    }

    public function productsStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|url', // Simplification for now
        ]);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function categoriesIndex()
    {
        return Inertia::render('Admin/Categories/Index', [
            'categories' => Category::withCount('products')->get(),
        ]);
    }
}
