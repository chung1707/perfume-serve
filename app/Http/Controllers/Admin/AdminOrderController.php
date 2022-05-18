<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\AppConst;
use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminOrderController extends Controller
{
    public function getOrders(Request $request){
        $ordersQuery = Order::orderBy('id','desc')->where($request->orderType,'=', true);
        if(isset($request->searchKey)){
            $search = $request->searchKey;
            $ordersQuery = $ordersQuery->where('transaction_id','like','%'.$search.'%');
        }
        $orders = $ordersQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
            // $orders->load('user');
            return response()->json($orders);
    }
    public function markDelivered(Order $order){
        $order->delivered = true;
        $order->processing = false;
        $order->pending = false;
        $order->canceled = false;
        $order->refunded = false;
        $order->update();
        return response()->json($order);
    }
    public function markCanceled(Order $order){
        $order->canceled = true;
        $order->pending = false;
        $order->processing = false;
        $order->delivered = false;
        $order->refunded = false;
        $order->update();
        foreach ($order->products as $item){
            $product = product::find($item->id);
            $product->quantity += $item->pivot->quantity;
            $product->sold -= $item->pivot->quantity;
            $product->update();
        }
        return response()->json($order);

    }
    public function markRefunded(Order $order){
        $order->refunded = true;
        $order->canceled = false;
        $order->pending = false;
        $order->processing = false;
        $order->delivered = false;
        $order->update();
        foreach ($order->products as $item){
            $product = product::find($item->id);
            $product->quantity += $item->pivot->quantity;
            $product->sold -= $item->pivot->quantity;
            $product->update();
        }
        return response()->json($order);
    }
    public function markProcess(Order $order){
        $order->processing = true;
        $order->pending = false;
        $order->delivered = false;
        $order->refunded = false;
        $order->canceled = false;
        $order->update();
        return response()->json($order);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $order->load('products','user');
        return response()->json($order);
    }
    public function destroy(Order $order)
    {
        try{
            $order->delete();
            return response()->json(['status' => 201, 'name' =>$order->transaction_id]);
        }catch(\Exception $e){
            return response()->json(['status' => 401, 'error' =>$e]);
        }
    }
}
