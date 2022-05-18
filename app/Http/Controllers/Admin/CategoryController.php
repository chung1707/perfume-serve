<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\category  ;
use App\Models\AppConst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getCategories(Request $request){
        $categoryQuery = Category::latest();
        if ($request[0]) {
            $key = $request[0];
            $categoryQuery = $categoryQuery->where('name', 'LIKE', "%$key%");
        }
        $categories = $categoryQuery->latest()->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        return response()->json($categories);
    }
}
