<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryFullResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class CategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }
    
    public function store(StoreRequest $request): CategoryFullResource
    {
        return new CategoryFullResource(Category::query()->create($request->validated()));
    }

    public function show(Category $category): CategoryFullResource
    {
        return new CategoryFullResource($category);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

        return new CategoryFullResource($category->fresh());
    }

    public function destroy(Category $category): bool
    {
        return $category->delete() > 0;
    }
}
