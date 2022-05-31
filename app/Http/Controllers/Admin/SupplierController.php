<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppConst;
use App\Models\supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    public function getSuppliers(Request $request){
        $supplierQuery = supplier::latest();
        if ($request[0]) {
            $key = $request[0];
            $supplierQuery = $supplierQuery->where('name', 'LIKE', "%$key%");
        }
        $suppliers = $supplierQuery->latest()->paginate(AppConst::DEFAULT_ORDER_PER_PAGE);
        return response()->json($suppliers);
    }
    public function store(StoreSupplierRequest $request)
    {
        $supplier = new Supplier;
        $supplier->create($request->all());
        return response()->json(['success' => true]);
    }
    public function update(UpdateSupplierRequest $request, $id)
    {
        $supplier =  Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        if($request->logo && $request->logo != $supplier->logo){
            $supplier->logo = $request->logo;
        }
        $supplier->update();
        return response()->json(['success' => true]);
    }
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }
    public function deleteSupllier($id)
    {
        try {
            $supplier = Supplier::find($id);
            $supplier->delete();
            return response()->json(['status' => 201, 'name' => $supplier->name]);
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'error' => $e]);
        }
    }
}
