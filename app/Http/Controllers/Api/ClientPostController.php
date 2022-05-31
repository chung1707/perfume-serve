<?php

namespace App\Http\Controllers\Api;

use App\Models\AppConst;
use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientPostController extends Controller
{
    public function getPosts(Request $request)
    {
        $postQuery = post::where('approved', true)->latest();
        if ($request[0]) {
            $key = $request[0];
            $postQuery = $postQuery->where('category_id', $key);
        }
        $posts = $postQuery->paginate(AppConst::DEFAULT_POST_PER_PAGE);
        return response()->json($posts);
    }
    public function show($id)
    {
        $post = Post::find($id);
        $post->load('category', 'user');
        $relatedPosts = Post::where('category_id', $post->category_id)
        ->where('id','!=',$post->id)->inRandomOrder()
        ->take(AppConst::DEFAULT_RELATED_POSTS)->get();
        return response()->json([
            'post' =>$post,
            'relatedPosts' =>$relatedPosts,
        ]);
    }
}
