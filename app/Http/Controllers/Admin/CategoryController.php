<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\AppConst;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function getCategories(Request $request)
    {
        $categoryQuery = Category::latest();
        if ($request[0]) {
            $key = $request[0];
            $categoryQuery = $categoryQuery->where('name', 'LIKE', "%$key%");
        }
        $categories = $categoryQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        return response()->json($categories);
    }
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category;
        $category->create($request->all());
        return response()->json(['success' => true]);
    }
    public function update(StoreCategoryRequest $request, $id)
    {
        $category =  Category::find($id);
        $category->update($request->all());
        return response()->json(['success' => true]);
    }
    public function show($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }
    public function deleteCategory($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            return response()->json(['status' => 201, 'name' => $category->name]);
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'error' => $e]);
        }
    }
}
