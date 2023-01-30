@extends('layouts.app')

@section('title') Update @endsection

@section('content')
 <form method="POST" action="{{route('posts.update', $post->id)}}">
        @csrf
         @method('PUT')
         <div class="mb-3">
            {{-- <label class="form-label">Title</label> --}}
            <input type="hidden" class="form-control" value={{$post->id}} name="id">
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" value={{$post->title}} name="title">
        </div>
        <div class="mb-3">
            {{-- <label class="form-label">Title</label> --}}
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
            <input type="text" class="form-control"  value={{$post->user->name}} name="post_creator">
            @else
            <input type="text" class="form-control" value="User Not Found" name="post_creator">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Created at</label>
            <input type="text" class="form-control" value={{$post['created_at']}}>
        </div>


        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
