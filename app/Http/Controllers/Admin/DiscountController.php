<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppConst;
use App\Models\discount;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;

class DiscountController extends Controller
{
    public function getDiscounts(Request $request)
    {
        $discountQuery = discount::latest();
        if ($request[0]) {
            $key = $request[0];
            $discountQuery = $discountQuery->where('code', 'LIKE', "%$key%");
        }
        $discounts = $discountQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        return response()->json($discounts);
    }
    public function store(StoreDiscountRequest $request)
    {
        $discount = new discount;
        $discount->create($request->all());
        return response()->json(['success' => true]);
    }
    public function update(UpdateDiscountRequest $request, $id)
    {
        $discount = Discount::find($id);
        $discount->update($request->all());
        return response()->json(['success' => true]);
    }
    public function show($id)
    {
        $discount = discount::find($id);
        return response()->json($discount);
    }
    public function delete($id)
    {
        try {
            $discount = discount::find($id);
            $discount->delete();
            return response()->json(['status' => 201, 'name' => $discount->name]);
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'error' => $e]);
        }
    }
    public function useDiscount($code){
        $discount = Discount::where('code', $code)->where('validDate', '>=', Carbon::now())->first();
        if($discount){
            return response()->json(['status' => 201, 'discount' =>$discount]);
        }else {
            return response()->json(['status' => 401]);
        }
    }
}
