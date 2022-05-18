<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppConst;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function getPosts(Request $request){
        $postQuery = Post::latest();
        if ($request[0]) {
            $key = $request[0];
            $postQuery = $postQuery->where('name', 'LIKE', "%$key%");
        }
        $posts = $postQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        $posts->load('category','user');
        return response()->json($posts);
    }
}
