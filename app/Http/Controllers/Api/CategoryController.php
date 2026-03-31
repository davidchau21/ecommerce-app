<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends BaseApiController
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): JsonResponse
    {
        $categories = $this->categoryService->getAll();
        return $this->successResponse($categories, 'Categories retrieved successfully.');
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->create($request->validated());
        return $this->successResponse($category, 'Category created successfully.', 201);
    }

    public function show(int $id): JsonResponse
    {
        $category = $this->categoryService->findById($id);
        if (!$category) {
            return $this->errorResponse('Category not found.', 404);
        }
        return $this->successResponse($category, 'Category retrieved successfully.');
    }

    public function update(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        $updated = $this->categoryService->update($id, $request->validated());
        if (!$updated) {
            return $this->errorResponse('Category not found.', 404);
        }
        return $this->successResponse(null, 'Category updated successfully.');
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->categoryService->delete($id);
        if (!$deleted) {
            return $this->errorResponse('Category not found.', 404);
        }
        return $this->successResponse(null, 'Category deleted successfully.');
    }
}
