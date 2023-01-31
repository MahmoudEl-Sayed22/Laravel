@extends('layouts.app')

@section('title') show @endsection

@section('content')
       <div class="card border-success mb-3 mt-3" style="text-align:center;width: 100%;">
        <div class="card-header border-success;" style="text-align:center;background-color: powderblue;">Topic Title : {{$post->title}}</div>
        <div class="card-body text-success" style="background-color:antiquewhite">
          {{-- <h5 class="card-title">Success card title</h5> --}}
          <p class="card-text" style="text-align:center;Height:70px;text-align:center;">{{$post->description}}</p>
        </div>
        @if($post->user)
        <div class="card-footer  border-success" style="text-align:center;background-color: powderblue;color:red;">
            Posted By : {{$post->user->name}}
         </div>
         @else
         <div class="card-footer  border-success" style="text-align:center;background-color: powderblue;color:red;">
            Posted By : User Not Found
         </div>
        @endif

        <div class="card-footer  border-success" style="text-align:center;background-color: powderblue;">
            Created at : {{$post->created_at}}
         </div>
         <div style="margin:30px auto"
         <h6>Display Comments</h6>

                    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                    <hr />
                    <h6>Add comment</h6>
                    <form method="post" action="{{ route('comments.store') }}" style="width:300px;text:a">
                        @csrf
                        <div class="form-group" >
                            <textarea class="form-control" name="body" ></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group" >
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                </div>
      </div>

@endsection
