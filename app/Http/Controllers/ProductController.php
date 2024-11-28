<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\AttachCategoriesRequest;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductFullResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class ProductController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::all());
    }

    public function store(StoreRequest $request): ProductFullResource
    {
        return new ProductFullResource(Product::query()->create($request->validated()));
    }

    public function show(Product $product): ProductFullResource
    {
        return new ProductFullResource($product);
    }

    public function update(UpdateRequest $request, Product $product): ProductFullResource
    {
        $product->update($request->validated());

        return new ProductFullResource($product->fresh());
    }

    public function destroy(Product $product): bool
    {
        return $product->delete() > 0;
    }

    public function attachCategory(Product $product, Category $category): bool
    {

        return $product->categories()->attach($category->id) > 0;
    }

    public function attachCategories(AttachCategoriesRequest $request, Product $product): JsonResponse
    {

        // Валидация уже выполнена, можно получить данные
        $categoryIds = $request->validated('categories');

        // Добавление категорий через attach
        $product->categories()->sync($categoryIds);

        return response()->json(['message' => 'Categories attached successfully'], 200);
    }

}
