<?php

namespace App\Http\Controllers\Admin;

use App\Models\banner;
use App\Models\AppConst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;

class BannerController extends Controller
{
    public function getbanners(Request $request)
    {
        $bannerQuery = banner::latest();
        if ($request[0]) {
            $key = $request[0];
            $bannerQuery = $bannerQuery->where('title', 'LIKE', "%$key%");
        }
        $banners = $bannerQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        $banners->load('user');
        return response()->json($banners);
    }
    public function store(StoreBannerRequest $request)
    {
        if ($request->homeBanner == true) {
            $banner = Banner::where('homeBanner', true)->first();
            if ($banner) {
                $banner->homeBanner = false;
                $banner->update();
            }
        }
        if ($request->thumbnail1 == true) {
            $banner = Banner::where('thumbnail1', true)->first();
            if ($banner) {
                $banner->thumbnail1 = false;
                $banner->update();
            }
        }
        if ($request->thumbnail2 == true) {
            $banner = Banner::where('thumbnail2', true)->first();
            if ($banner) {
                $banner->thumbnail2 = false;
                $banner->update();
            }
        }
        $banner = new banner;
        $banner->fill($request->all());
        $banner->user_id = auth('sanctum')->user()->id;
        $banner->save();
        return response()->json(['success' => true]);
    }
    public function update(UpdateBannerRequest $request, $id)
    {
        if ($request->homeBanner == true) {
            $banner = Banner::where('homeBanner', true)->first();
            $banner->homeBanner = false;
            $banner->update();
        }
        if ($request->thumbnail1 == true) {
            $banner = Banner::where('thumbnail1', true)->first();
            $banner->thumbnail1 = false;
            $banner->update();
        }
        if ($request->thumbnail2 == true) {
            $banner = Banner::where('thumbnail2', true)->first();
            $banner->thumbnail2 = false;
            $banner->update();
        }
        $banner =  banner::find($id);
        $banner->update($request->all());
        return response()->json(['success' => true]);
    }
    public function show($id)
    {
        $banner = banner::find($id);
        return response()->json($banner);
    }
    public function delete($id)
    {
        try {
            $banner = banner::find($id);
            $banner->delete();
            return response()->json(['status' => 201, 'name' => $banner->name]);
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'error' => $e]);
        }
    }
    public function clientBanners()
    {
        $homeBanner = Banner::where('homeBanner', true)->first();
        $thumbnail1 = Banner::where('thumbnail1', true)->first();
        $thumbnail2 = Banner::where('thumbnail2', true)->first();
        return response()->json([
            'homeBanner' => $homeBanner,
            'thumbnail1' => $thumbnail1,
            'thumbnail2' => $thumbnail2,
        ]);
    }
}
