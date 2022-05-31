<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\AppConst;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function getPosts(Request $request)
    {
        $postQuery = Post::where('approved',false)->latest();
        if ($request[0]) {
            $key = $request[0];
            $postQuery = $postQuery->where('title', 'LIKE', "%$key%");
        }
        $posts = $postQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        $posts->load('category', 'user');
        return response()->json($posts);
    }
    public function getApprovedPosts(Request $request)
    {
        $postQuery = Post::where('approved',true)->latest();
        if ($request[0]) {
            $key = $request[0];
            $postQuery = $postQuery->where('title', 'LIKE', "%$key%");
        }
        $posts = $postQuery->paginate(AppConst::DEFAULT_PER_ADMIN_PAGE);
        $posts->load('category', 'user');
        return response()->json($posts);
    }
    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->fill($request->all());
        $post->user_id = auth('sanctum')->user()->id;
        $post->save();
        return response()->json(['success' => true]);
    }
    public function show($id)
    {
        $post = Post::find($id);
        $post->load('user', 'category');
        return response()->json($post);
    }
    public function update(UpdatePostRequest $request, $id)
    {
        $post =  Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->thumbnail = $request->thumbnail;
        if ($request->thumbnail && $request->thumbnail != $post->thumbnail) {
            $post->thumbnail = $request->thumbnail;
        }
        $post->update();
        return response()->json(['success' => true]);
    }
    public function destroy($id)
    {
        try {
            Post::find($id)->delete();
            return response()->json(['status' => 201]);
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'error' => $e]);
        }
    }
    public function approve($id)
    {
        try {
            $post = Post::find($id);
            $post->approved = true;
            $post->update();
            return response()->json(['status' => 201]);
        } catch (\Exception $e) {
            return response()->json(['status' => 401, 'error' => $e]);
        }
    }
}
