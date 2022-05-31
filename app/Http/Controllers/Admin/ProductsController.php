<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\picture;
use App\Models\product;
use App\Models\AppConst;
use App\Models\category;
use App\Models\supplier;
use App\Models\importBill;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\updateProductRequest;

class ProductsController extends Controller
{
    public function getProducts(Request $request)
    {
        $productQuery = product::latest();
        if (isset($request[0])) {
            $search = $request[0];
            $productQuery = $productQuery->where('name', 'like', '%' . $search . '%');
        }
        $products = $productQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        $products->load('pictures');
        return response()->json($products);
    }
    public function show($id)
    {
        $product = Product::find($id);
        $product->load('category', 'pictures', 'supplier', 'productDetail');
        return response()->json($product);
    }
    public function newQuantity(Request $request, $id)
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
    public function searchOldProducts(Request $request)
    {
        $search = $request[0];
        $products = Product::where('name', 'like', '%' . $search . '%')
            ->orWhere('productCode', 'like', '%' . $search . '%')->with('productDetail')->take(3)->get();
        return response()->json($products);
    }
    public function store(Request $request)
    {
        try {
            $importbill = new importBill;
            $importbill->transaction_id = Str::random(AppConst::TRANSACTION_CODE);
            $importbill->supplier_id = $request->bill[1];
            $importbill->totalPrice = $request->bill[2];
            $importbill->user_id = auth('sanctum')->user()->id;
            $importbill->save();
            $products = $request->items;
            foreach ($products as $item) {
                $product = product::where('productCode', '=', $item['productCode'])->first();
                if ($product) {
                    $product->quantity += $item['quantity'];
                    $product->update();
                    $importbill->products()->attach($product, ['quantity' => $item['quantity'], 'price' => $item['price']]);
                } else {
                    $product = new product;
                    $product->fill($item);

                    if ($product->product_detail_id) {
                        $product->save();
                        $importbill->products()->attach($product, ['quantity' => $item['quantity'], 'price' => $item['price']]);
                    } else {
                        $productDetail = new ProductDetail;
                        $productDetail->fill($item);
                        $productDetail->save();
                        $product->product_detail_id = $productDetail->id;
                        $product->save();
                        $importbill->products()->attach($product, ['quantity' => $item['quantity'], 'price' => $item['price']]);
                    }
                    if ($item['pictures']) {
                        foreach ($item['pictures'] as $file) {
                            $pictures[] = [
                                'product_id' => $product->id,
                                'img' =>  $file,
                            ];
                        }
                        picture::insert($pictures);
                    }
                }
            }
            return response()->json(['success' => true, 'status' => 201]);
        } catch (\Exception $e) {
            return response()->json(['e' => $e, 'status' => 401]);
        }
    }
    public function update(updateProductRequest $request, product $product)
    {
        try {
            $product->fill($request->all());
            $product->update();
            $productDetail = ProductDetail::find($product->product_detail_id);
            $productDetail->fill($request->all());
            $fragrant = [
                'scent' => explode(",", $request->scent),
                'topNotes' => explode(",", $request->topNotes),
                'middleNotes' => explode(",", $request->middleNotes),
                'baseNote' => explode(",", $request->baseNote),
            ];
            $productDetail->fragrant = $fragrant;
            // return response()->json(['success' => $productDetail]);
            $productDetail->update();

            // cap nhap anh cho san pham
            if (isset($request->newPictures)) {
                picture::where('product_id', $product->id)->delete();
                foreach (explode(',', $request->newPictures) as $file) {
                    $pictures[] = [
                        'product_id' => $product->id,
                        'img' =>  $file,
                    ];
                }
                picture::insert($pictures);
            }
            return response()->json(['success' => 201]);
        } catch (Exception $e) {
            return response()->json(['error' => $e, 'status' => 401]);
        }
    }
    public function importBills(Request $request)
    {
        $billsQuery = ImportBill::latest();
        if (isset($request->searchKey)) {
            $search = $request->searchKey;
            $billsQuery = $billsQuery->where('transaction_id', 'like', '%' . $search . '%');
        }
        $bills = $billsQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        $bills->load('user', 'supplier');
        return response()->json($bills);
    }
    public function showBill($id)
    {
        $bill = ImportBill::find($id);
        $bill->load('products','user','supplier');
        return response()->json($bill);
    }
    public function deleteBill($id){
        try{
            $bill = ImportBill::find($id);
            $bill->delete();
            return response()->json(['status' => 201, 'name' =>$bill->transaction_id]);
        }catch(\Exception $e){
            return response()->json(['status' => 401, 'error' =>$e]);
        }
    }
}
