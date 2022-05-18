<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Order;
use App\Models\product;
use App\Models\AppConst;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;

class OrderController extends Controller
{
    public function storeOrder(StoreOrderRequest $request)
    {
        try{
            // tao don hang
            $order = new Order;
            $order->fill($request->all());
            $order->user_id = auth('sanctum')->user()->id;
            $order->transaction_id = Str::random(AppConst::TRANSACTION_CODE);
            $order->save();
            // Attach san pham vao don hang
            $products = $request->products;
            foreach($products as $product){
                $item = product::find($product['id']);
                $order->products()->attach(
                    $item,
                    [
                        'quantity' => $product['pivot']['quantity'],
                        'price' => $product['price'],
                        'discount' => $product['discount']
                    ]
                );
                // cap nhap so luong san pham va so luong ban ra
                $item->quantity -= $product['pivot']['quantity'];
                $item->sold += $product['pivot']['quantity'];
                $item->update();
            }
            return response()->json(['success' => true, 'status' => 201]);
        }catch(Exception $e){
            return response()->json(['e' => $e, 'status' => 401]);
        }
    }
    public function cancelOrder(Order $order){
        if($order->pending){
            $order->canceled = true;
            $order->processing = false;
            $order->pending = false;
            $order->delivered = false;
            $order->refunded = false;
            $order->update();
            foreach ($order->products as $item){
                $product = product::find($item->id);
                $product->quantity += $item->pivot->quantity;
                $product->sold -= $item->pivot->quantity;
                $product->update();
            }
            return response()->json('success');
        }
        return response()->json('error');
    }
}
