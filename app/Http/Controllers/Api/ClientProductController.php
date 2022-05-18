<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppConst;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use App\Models\Category;

class ClientProductController extends Controller
{
    public function index(Request $request)
    {
        $min = null;
        $max = null;
        $categoryId = null;
        $productsQuery = Product::with('pictures');
        if ($request->keyWord) {
            $productsQuery = $productsQuery->where('name', 'LIKE', "%$request->keyWord%");
        }
        if($request->brandId){
            $productsQuery = $productsQuery->where('supplier_id', '=', $request->brandId);
        }
        if ($request->arrangeKey) {
            $sortId = $request->arrangeKey[0];
            if ($request->arrangeKey[0] == "1") {
                $productsQuery = $productsQuery->latest();
            }
            if ($request->arrangeKey[0] == "2") {
                $productsQuery = $productsQuery->orderBy('price', 'ASC');
            }
            if ($request->arrangeKey[0] == "3") {
                $productsQuery = $productsQuery->orderBy('price', 'desc');
            }
        }
        if ($request->priceRange) {
            $min = $request->priceRange[1];
            $max = $request->priceRange[2];
            if ($max == 'null') {
                $productsQuery = $productsQuery->where('price', '>', $min);
            } else {
                $productsQuery = $productsQuery->where('price', '>', $min)->where('price', '<', $max);
            }
        }
        if ($request->categoryId) {
            $categoryId = $request->categoryId;
            $productsQuery = $productsQuery->where('category_id', '=', $categoryId);
        }
        $products = $productsQuery->paginate(AppConst::DEFAULT_PRODUCTS_PER_PAGE);
        return response()->json($products);
    }
    public function CategoriesInProductsPage()
    {
        $categories = DB::table('categories')
            ->where('for_product', true)
            ->select('id', 'name')
            ->get();
        return response()->json($categories);
    }
    public function BrandsInProductsPage()
    {
        $brands = DB::table('Suppliers')
            ->select('id', 'name')
            ->get();
        return response()->json($brands);
    }
    public function search(Request $request)
    {
        $key = $request[0];
        $productCount = Product::where('name', 'LIKE', "%$key%")->count();
        $products = Product::where('name', 'LIKE', "%$key%")->with('pictures')->with('supplier')->take(AppConst::DEFAULT_PRODUCTS_SEARCH)->get();
        return response()->json([
            'products' => $products,
            'total' => $productCount
        ]);
    }
    public function show(Request $request, $id){
        $product = Product::where('id', '=', $id)
        ->with('pictures')
        ->with('supplier')
        ->with('productDetail')
        ->with('category')
        ->first();
        $relatedProducts = Product::where('product_detail_id', '=', $product->product_detail_id)
        ->orWhere('supplier_id', '=', $product->supplier)
        ->orWhere('category_id', '=', $product->category_id)
        ->with('pictures')->take(AppConst::DEFAULT_RELATED_PRODUCTS)->get();
        return response()->json([
            'product' => $product,
            'relatedProducts' => $relatedProducts,
        ]);
    }
}
