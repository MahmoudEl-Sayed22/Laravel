@extends('layouts.app')

@section('title') Update @endsection

@section('content')
 <form method="POST" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
        @csrf
         @method('PUT')
         <div class="mb-3">
            <input type="hidden" class="form-control" value={{$post->id}} name="id">
        </div>
        <div>
            <input type="hidden" class="form-control" value={{$post->title}} name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <textarea
                class="form-control" name="description"
            >{{$post->title}}</textarea>
        </div>
        <div class="mb-3">
            <input type="hidden" class="form-control" value={{$post->description}} name="description">
        </div>
        <div class="mb-3">
            <label  class="form-label" name="description">Description</label>
            <textarea
                class="form-control" name="description"
            >{{$post->description}}</textarea>
            </div>

        <div class="mb-3">
            <label class="form-label">Posted by</label>
            @if($post->user)
            <div>{{$post->user->name}}</div>
            @else
            <div>User Not Found</div>
            @endif
        </div>

        <div class="mb-3">
            {{-- <label class="form-label">Created at</label> --}}
            <input type="hidden" class="form-control" value={{$date}}>
        </div>
        <div class="mb-3">
            <label class="form-label">Created at</label>
            <textarea
                class="form-control" name="created_at"
            >{{$date}}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image" value={{$post['image']}}>
            <img src="{{ asset('uploads/posts/'.$post->image) }}" width="70px" height="70px" alt="image">
        </div>


        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
