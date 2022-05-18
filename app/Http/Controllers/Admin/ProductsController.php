<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppConst;
use App\Models\product;
use App\Models\category;
use App\Models\supplier;
use App\Models\picture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function getProducts(Request $request)
    {
        $productQuery = product::orderBy('id', 'desc');
        if(isset($request[0])){
            $search = $request[0];
            $productQuery = $productQuery->where('name','like','%'.$search.'%');
        }
        $products = $productQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        $products->load('pictures');
        return response()->json($products);
    }
    public function show($id)
    {
        $product = Product::find($id);
        $product->load('category', 'pictures', 'supplier','productDetail');
        return response()->json($product);
    }
    public function newQuantity(Request $request,$id)
    {
        $product = Product::find($id);
        $product->quantity = $request->quantity;
        $product->update();
        return response()->json($product);
    }
    public function destroy(product $product)
    {
        try {
            $product->delete();
            return response()->json(['status' => 201, 'name' => $product->name]);
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'error' => $e]);
        }
    }
}
