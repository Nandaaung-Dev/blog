<?php

namespace App\Modules\Categories\Services;

use App\Modules\Categories\Models\Category;

class CategoryService
{
    public function getAll()
    {
        $categories = Category::all();

        return $categories;
    }

    public function show($id)
    {
        $category = Category::find($id);

        return $category;
    }


    public function store($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description ?? "";
        $category->save();

        return $category;
    }

    public function update($request, $category)
    {
        $category->name = $request->name;
        $category->description = $request->description ?? "";
        $category->save();

        return $category;
    }
}
