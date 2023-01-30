@extends('layouts.app')

@section('title') index @endsection

@section('content')
    <div class="text-center">
        <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
    </div>
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
{{--            @dd($post)--}}
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                @if($post->user)
                <td>{{$post->user->name}}</td>
                @else
                <td>User Not Found</td>
                @endif
                <td>{{$post->created_at}}</td>
                <td>
                <form method="POST" action="{{route('posts.destroy', $post->id)}}" onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @csrf
                    @method('delete')
                    <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a>
                    <input type="submit" class="btn btn-danger btn-sm" value="delete"/>
                </td>
            </form>
            </tr>
        @endforeach


        </tbody>
    </table>

@endsection
