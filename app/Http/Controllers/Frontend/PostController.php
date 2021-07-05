<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Image;

class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    function new_post(Request $request){

        if($request->hasFile('post_images')){
            $post_images =   $request->file('post_images');
            $filename1 = time().'.'.$post_images->getClientOriginalExtension();
            Image::make($post_images)->save( public_path('/post/'. $filename1) );
            $user = Auth::user();
            $user->post_images = $filename1;
            // $user->save();
        }

        if($request->hasFile('post_audio')){
            $post_audio =   $request->file('post_audio');
            $filename2 = time() . '.' .$post_audio->getClientOriginalExtension();
            $post_audio->save( public_path('/post/'. $filename2) );
            $user = Auth::user();
            $user->post_audio = $filename2;
            // $user->save();
        }

        $post = new Post();

        $post->post_id      = Auth::user()->name.rand(1,35);
        $post->post_body    = $request->post_body;
        $post->post_images  = $filename1;
        // $post->post_audio   = $filename2;
        $post->post_status  = $request->post_status;
        $post->post_privacy = $request->post_privacy;

        $request->user()->post()->save($post);

        return back();

    }
}
