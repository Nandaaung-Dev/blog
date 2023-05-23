<?php

namespace App\Modules\Categories\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categories\Http\Requests\CreateCategoryRequest;
use App\Modules\Categories\Http\Requests\UpdateCategoryRequest;
use App\Modules\Categories\Models\Category;
use App\Modules\Categories\Services\CategoryService;

class CategoryController extends Controller
{
    private $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->getAll();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(Category $category)
    {
        $category = $this->service->show($category->id);

        return view('categories.show', [
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $request->validated();

        $category = $this->service->store($request);

        return redirect()->route('categories.index')->with('info', 'Successsfully created');
    }


    public function edit($id)
    {
        $category = $this->service->show($id);

        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->validated();
        $category = $this->service->update($request, $category);

        return redirect()->route('categories.index')->with('info', 'Successsfully updated');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index')->with('info', 'Successsfully deleted');
    }
}
