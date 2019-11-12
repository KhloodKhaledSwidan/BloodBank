<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Client;
use App\Models\ClientPost;

class PostSController extends Controller
{
    //

    public function posts()
    {
        $posts = Post::paginate(5);
        return responseJson(1, 'success', $posts);
    }

    public function post(Request $request)
    {
        // spectify photo and title only
        // wrong api token give me error not json message
        $posts = Post::where('category_id', $request->category_id)->get();
        if (count($posts) <= 0) {
            return responseJson(0, 'failed');
        } else {

            return responseJson(1, 'success', $posts);

        }
    }


    public function singlePost($id)
    {
        $post = Post::findOrFail($id);
        return responseJson(1, 'success', $post);
    }


    public function myFavourite()
    {

        $posts = auth()->user()->posts()->paginate(10);
        return responseJson(1, 'success', $posts);
    }


    public function toggle_favourite(Request $request)
    {
        $client = auth()->user()->posts()->toggle($request->post_id);


        return responseJson(1, 'success', $client);


    }


}
