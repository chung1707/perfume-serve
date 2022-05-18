<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppConst;
use App\Models\supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function getSuppliers(Request $request){
        $supplierQuery = supplier::latest();
        if ($request[0]) {
            $key = $request[0];
            $supplierQuery = $supplierQuery->where('name', 'LIKE', "%$key%");
        }
        $suppliers = $supplierQuery->latest()->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        return response()->json($suppliers);
    }
}
