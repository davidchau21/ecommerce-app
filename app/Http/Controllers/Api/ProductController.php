<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends BaseApiController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request): JsonResponse
    {
        $products = $this->productService->filterProducts($request->all(), $request->get('per_page', 15));
        return $this->paginatedResponse($products, 'Products retrieved successfully.');
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = $this->productService->createProduct($request->validated());
        return $this->successResponse($product, 'Product created successfully.', 201);
    }

    public function show(int $id): JsonResponse
    {
        $product = $this->productService->findProduct($id);
        if (!$product) {
            return $this->errorResponse('Product not found.', 404);
        }
        return $this->successResponse($product, 'Product retrieved successfully.');
    }

    public function update(UpdateProductRequest $request, int $id): JsonResponse
    {
        $updated = $this->productService->updateProduct($id, $request->validated());
        if (!$updated) {
            return $this->errorResponse('Product not found.', 404);
        }
        return $this->successResponse(null, 'Product updated successfully.');
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->productService->deleteProduct($id);
        if (!$deleted) {
            return $this->errorResponse('Product not found.', 404);
        }
        return $this->successResponse(null, 'Product deleted successfully.');
    }
}
