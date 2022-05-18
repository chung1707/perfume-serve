<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\AppConst;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function latestProducts(){
        $latestProductsMale = Product::where('category_id','=', 1)
        ->latest()->take(AppConst::DEFAULT_PRODUCTS_IN_HOME)->with('pictures')->get();
        $latestProductsFemale = Product::where('category_id','=', 2)
        ->latest()->take(AppConst::DEFAULT_PRODUCTS_IN_HOME)->with('pictures')->get();
        return response()->json([
            'male'=>$latestProductsMale,
            'female' => $latestProductsFemale
        ]);
    }
    public function bestSeller(){
        $bestSellerMale = Product::where('category_id','=', 1)
        ->orderBy('sold','desc')->take(AppConst::DEFAULT_PRODUCTS_IN_HOME)->with('pictures')->get();
        $bestSellerFemale = Product::where('category_id','=', 2)
        ->orderBy('sold','desc')->take(AppConst::DEFAULT_PRODUCTS_IN_HOME)->with('pictures')->get();
        return response()->json([
            'male'=>$bestSellerMale,
            'female' => $bestSellerFemale
        ]);
    }
    public function brandLogos(){
        $brandLogos = DB::table('suppliers')
        ->select('logo')
        ->get();
        return response()->json(['brandLogos'=>$brandLogos]);
    }
}
