<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UploadController extends Controller
{
    public function uploads(Request $request){

        // return response()->json($request->image);
        if($request->image){
            $file =$request->image;
            $random = Str::random(10);
                $fileName = time().'.' . explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];
                $fileName = time().'_'.$random.$fileName;
                $img = Image::make($file)->encode();;
                Storage::put($fileName, $img);
                Storage::move($fileName, 'public/images/' . $fileName);
            return response()->json(['fileName' => $fileName, 'success' => 201]);
        }else{
            return response()->json(['massage' => ' error uploading file',],503);
        }

    }
}
