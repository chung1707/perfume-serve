<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\product;
use App\Models\order;
use App\Models\AppConst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboadController extends Controller
{
    public function getDashboardInfo()
    {
        $user_role_id = 2;
        $totalUser = User::where('role_id', '=', $user_role_id)->count();
        $totalProduct = Product::count();
        $totalProcessOrder = Order::where('processing', true)->count();
        $totalDeliveredOrder = Order::where('delivered', true)->count();
        $newOrders = Order::where('pending', true)->take(AppConst::DEFAULT_ORDER_PER_PAGE)->get();
        $newAccounts = User::latest()->with('role')->take(AppConst::DEFAULT_ORDER_PER_PAGE)->get();
        return response()->json([
            'newOrders' => $newOrders,
            'totalUser' => $totalUser,
            'totalProduct' => $totalProduct,
            'totalProcessOrder' => $totalProcessOrder,
            'totalDeliveredOrder' => $totalDeliveredOrder,
            'newAccounts' => $newAccounts,
        ]);
    }
}
