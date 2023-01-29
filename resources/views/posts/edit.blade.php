@extends('layouts.app')

@section('title') create @endsection

@section('content')
 <form method="POST" action="/posts">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" value={{$post->title}}>
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea
                class="form-control"
            >{{$post->description}}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Posted by</label>
            @if($post->user)
            <input type="text" class="form-control" value={{$post->user->name}}>
            @else
            <input type="text" class="form-control" value="User Not Found">
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Created at</label>
            <input type="text" class="form-control" value={{$post['created_at']}}>
        </div>


        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
