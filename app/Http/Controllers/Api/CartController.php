<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        $cart = auth('sanctum')->user()->cart;
        $Products = $cart->Products()->with('pictures')->get();
        $ProductTotals = $cart->Products->sum('pivot.quantity');
        return response()->json(['Products' => $Products, 'ProductTotals' => $ProductTotals]);
    }
    public function store(Request $request)
    {
        if ($request->quantity) {
            $quantitiDetails = $request->quantity;
        } else {
            $quantitiDetails = 1;
        }
        $Product = Product::find($request->product_id);
        $cart = auth('sanctum')->user()->cart;
        $ProductInCart = $cart->Products()->where('product_id', '=', $Product->id)->first();
        if (empty($ProductInCart)) {
            $cart->Products()->attach($Product, ['quantity' => $quantitiDetails]);
        } else {
            $quantity = $ProductInCart->pivot->quantity;
            if($quantity+$quantitiDetails > $ProductInCart->quantity){
                $cart->Products()->updateExistingPivot($Product, [
                    'quantity' => $Product->quantity,
                ]);
            }
            else{
                $cart->Products()->updateExistingPivot($Product, [
                    'quantity' => $quantity + $quantitiDetails,
                ]);
            }
        }
    }
    public function deleteProductIncart(Request $request)
    {
        $cart = auth('sanctum')->user()->cart;
        $Product = Product::find($request->product_id);
        $cart->Products()->detach($Product);
    }
    public function updateQty(Request $request)
    {
        $newQty = $request->newQuanty;
        $cart = auth('sanctum')->user()->cart;
        $Product = $cart->Products()->where('product_id', '=', $request->product_id)->first();
        $cart->Products()->updateExistingPivot($Product, [
            'quantity' => $Product->pivot->quantity + ($newQty - $Product->pivot->quantity),
        ]);
        return response()->json(['qty' => $Product->pivot->quantity]);
    }
    public function clearCart(){
        $cart = auth('sanctum')->user()->cart;
        $cart->products()->detach();
    }
}
