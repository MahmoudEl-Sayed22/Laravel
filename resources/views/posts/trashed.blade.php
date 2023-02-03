
@extends('layouts.app')

@section('title') index @endsection

@section('content')
    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
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
                    <img src="{{ asset('uploads/posts/'.$post->image) }}" width="70px" height="70px" alt="image" name="image">
                </td>
                <td>
                <form method="POST" action="{{route('posts.trashed.restore', $post->id)}}" onsubmit="return confirm('Are you sure you want to restore this post?')">
                    @csrf
                    <input type="submit" class="btn btn-success btn-sm" value="Restore"/>
                </td>
                <td>
            </form>
                <form method="POST" action="{{route('posts.trashed.destroy', $post->id)}}" onsubmit="return confirm('Are you sure you want to Force delete this post?')">
                    @csrf
                    <input type="submit" class="btn btn-danger btn-sm" value="ForceDelete"/>
                </td>
            </form>
            </tr>
        @endforeach


        </tbody>
    </table>


@endsection
