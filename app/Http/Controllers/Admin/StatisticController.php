<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use App\Models\AppConst;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\importBill;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Statistic\CheckFeeRequest;
use App\Http\Requests\Statistic\CheckTurnOverRequest;

class StatisticController extends Controller
{
    public function getTurnover6Months()
    {
        $names = [
            Carbon::now()->month,
            Carbon::now()->month - 1,
            Carbon::now()->month - 2,
            Carbon::now()->month - 3,
            Carbon::now()->month - 4,
            Carbon::now()->month - 5,
        ];
        for ($i = 0; $i < count($names); $i++) {
            if ($names[$i] == 0) {
                $month = Order::whereYear('created_at', Carbon::now()->year - 1)
                    ->whereMonth('created_at', 12)
                    ->where('delivered', true)
                    ->sum('totalPrice');
            } else {
                $month = Order::whereYear('created_at', Carbon::now()->year)
                    ->whereMonth('created_at', Carbon::now()->month - $i)
                    ->where('delivered', true)
                    ->sum('totalPrice');
            }
            $months[] = $month;
        }
        $labels = array_map(function ($name) {
            if ($name == 0) {
                return 'Tháng 12(' . Carbon::now()->year - 1 . ')';
            }
            return 'Tháng ' . $name;
        }, $names);
        return response()->json([
            'months' => $months,
            'monthNames' => $labels
        ]);
    }
    public function getTurnoverByCategories()
    {
        $refunded = Order::where('refunded', true)->count('id');
        $delivered = Order::where('delivered', true)->count('id');
        $canceled = Order::where('canceled', true)->count('id');
        return response()->json([
            'data' => [
                $delivered,
                $refunded,
                $canceled
            ],
            'labels' => [
                'Đơn hàng thành công',
                'Đơn bị hoàn trả',
                'Đơn bị hủy'
            ]
        ]);
    }
    public function getCardData()
    {
        $totalBill = importBill::count('id');
        $turnover = Order::sum('totalPrice');
        $importFee = ImportBill::sum('totalPrice');
        return response()->json([
            'totalBill' => $totalBill,
            'turnover' => $turnover,
            'importFee' => $importFee,
        ]);
    }
    public function checkTurnOver(CheckTurnOverRequest $request)
    {
        $turnover = Order::where('created_at', '>', $request->start)
            ->where('created_at', '<', $request->end)->sum('totalPrice');
        return response()->json($turnover);
    }
    public function checkFee(CheckFeeRequest $request)
    {
        $fee = importBill::where('created_at', '>', $request->Start)
            ->where('created_at', '<', $request->End)->sum('totalPrice');
        return response()->json($fee);
    }
    public function getCardProductData()
    {
        $totalProduct = Product::count('id');
        $soldProducts = Product::sum('sold');
        $bestSeller = Product::orderBy('sold', 'desc')->first();
        $bestSupplier = Supplier::select('id', 'name', 'email')->withcount('products')
            ->orderBy('products_count', 'desc')->first();
        return response()->json([
            'totalProduct' => $totalProduct,
            'soldProducts' => $soldProducts,
            'bestSeller' => $bestSeller,
            'bestSupplier' => $bestSupplier,
        ]);
    }
    public function getOutOfStock()
    {
        $products = product::select('id', 'name', 'productCode','supplier_id')
        ->where('quantity','=', 0)
        ->with('supplier')
        ->paginate(AppConst::DEFAULT_ORDER_PER_PAGE);
        return response()->json($products);
    }
    public function getSoldProducts()
    {
        $categories = Category::where('for_product', true)->get();
        $data = [];
        $labels = [];
        for ($i = 0; $i < count($categories); $i++) {
            $sold = Product::where('category_id', $categories[$i]->id)->sum('sold');
            $data[] = $sold;
            $labels[] = $categories[$i]->name;
        }
        return response()->json([
            'data' => $data,
            'labels' => $labels,
        ]);
    }
}
