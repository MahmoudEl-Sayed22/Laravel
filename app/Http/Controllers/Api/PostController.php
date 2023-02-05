<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;


class PostController extends Controller
{
    public function index(){
        $posts= post::all();

        return PostResource::collection($posts);
        // $response =[];
        // foreach($posts as $post){
        //     $response = [
        //         'id' => $post->id,
        //     'title' => $post ->title,
        //     'description' => $post->description,
        //     ];
        // }
        // return $response;

    }

    public function show($postId){
        $post= post::find($postId);
        // return [
        //     'id' => $post->id,
        //     'title' => $post ->title,
        //     'description' => $post->description,
        // ];
        return new PostResource($post);

    }

    public function store(StorePostRequest $request){
        $data= $request->all();
        // dd($data);
        $title =$data['title'];
        $description = $data['description'];
        $userId = $data['post_creator'];
        // if($request->hasFile('image')){
        //     $file = $request->File('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time().'.'.$extension;
        //     $file ->move('uploads/posts/', $filename);
        //     $data['image'] = $filename ;

        // }
        $image = $request->file('image');
        $post = post::create([
            'title'=> $title,
            'description' => $description,
            'user_id' => $userId,
            'image' => 'this is image',

        ]);
        return $post;
    }
}
