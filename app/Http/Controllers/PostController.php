<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use \Illuminate\Http\Request ;
use Illuminate\Support\Facades\File;
use App\Models\post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Carbon;


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
if ($request->hasFile('image')) {
    $file = $request->File('image');
    $extension = $file->getClientOriginalExtension();
    $filename = time().'.'.$extension;
    $file ->move('uploads/posts/', $filename);
    $data['image'] = $filename ;
}
        else{
            $filename='';
        }



        post::create([
            'title'=> $title,
            'description' => $description,
            'user_id' => $userId,
            'image' => $filename,

        ]);
        return to_route(route:'posts.index');
        }

    public function show($postId)
    {
        $post=post::find($postId);
        $date=$post->created_at;
                // dd($postId);
        return view('posts.show',[
            'post' => $post,
            'date' =>Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('l jS \of F Y h:i:s A'),
        ]);
    }


    public function edit($postId)
    {

        $post=post::find($postId);
        $date=$post->created_at;
        // dd($date);
        return view('posts.edit',[
            'post' => $post,
            'date' =>Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('l jS \of F Y h:i:s A'),
        ]);
    }
    public function update(Request $request,$id)
    {
        // dd($request);
                $post = post::find($id);
                $data= $request->all();
        // dd($data);
        // dd($data,$post);
        $title =$data['title'];
        $description = $data['description'];
        if($request->hasFile('image')){
            $destination= 'uploads/posts/'.$post->image;
        if (File::exists($destination)) {
        File::delete($destination);
        }
            $file = $request->File('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file ->move('uploads/posts/', $filename);
            $data['image'] = $filename ;
        }else{
            $filename = $post->image;
        }
        // dd($filename);


        post::where('id',$data['id'] )->update([
            'title'=> $title,
            'description' => $description,
            'image' => $filename,
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

    public function trashed()
    {
        $posts = post::onlyTrashed()->get();
        return view('posts.trashed',[
            'posts'=>$posts
        ]);
    }


    public function trashedRestore($id)
    {
        $post = post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return to_route(route:'posts.index');
    }
    public function trashedDelete($id)
    {
        $post = post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();
        return to_route(route:'posts.index');
    }


}

