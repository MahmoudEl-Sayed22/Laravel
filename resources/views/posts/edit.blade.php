@extends('layouts.app')

@section('title') create @endsection

@section('content')
 <form method="POST" action="/posts">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" value={{$post['title']}}>
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea
                class="form-control"
            >{{$post['description']}}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Posted by</label>
            <input type="text" class="form-control" value={{$post['posted_by']}}>
        </div>

        <div class="mb-3">
            <label class="form-label">Created at</label>
            <input type="text" class="form-control" value={{$post['created_at']}}>
        </div>


        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
