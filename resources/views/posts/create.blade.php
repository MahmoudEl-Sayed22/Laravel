@extends('layouts.app')

@section('title') create @endsection

@section('content')
 <form method="POST" action="/posts">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea
                class="form-control"
            ></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Posted by</label>
            <input type="text" class="form-control" >
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection