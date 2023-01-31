<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = post::paginate(10);
    //    dd($allPosts);
        return view('posts.index',[
            'posts' => $allPosts,
        ]);
    }

    public function create()
    {
        $users = User::get();

        return view('posts.create',[
            'users' => $users,
        ]);
    }


    public function store(StorePostRequest $request)
    {

        $data= $request->all();
        // dd($data);
        $title =$data['title'];
        $description = $data['description'];
        $userId = $data['post_creator'];

        post::create([
            'title'=> $title,
            'description' => $description,
            'user_id' => $userId,
        ]);
        return to_route(route:'posts.index');
        }

    public function show($postId)
    {
        $post=post::find($postId);

                // dd($postId);
        return view('posts.show',[
            'post' => $post,
        ]);
    }
    public function edit($postId)
    {

        $post=post::find($postId);
        return view('posts.edit',[
            'post' => $post,
        ]);
    }
    public function update(Request $request)
    {
        // dd($request);
        $data= $request->all();
        // dd($data);
        // dd($data);
        $title =$data['title'];
        $description = $data['description'];
        // $userId = $data['id'];

        post::where('id',$data['id'] )->update([
            'title'=> $title,
            'description' => $description,
            // 'user_id' => $userId,
        ]);
        return to_route(route:'posts.index');
    }
    public function destroy($postId)
    {
        $post=post::find($postId);
        $post->delete();

        return to_route(route:'posts.index');
    }

}

