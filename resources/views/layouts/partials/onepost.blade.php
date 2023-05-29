@extends('layouts.app-master')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@section('content')
    <div class="row">
      <div class="col-md-8 offset-md-2 mt-5">
        <h2 class="mb-4">Fórum bejegyzés</h2>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $post->author->username }}</h6>
            <p class="card-text">{{$post->content}}</p>
            <p class="card-text">{{$post->created_at}}</p>
            @auth
                    @if (!$post->likedBy(auth()->user()))
                        <form action="{{ route('posts.like', $post->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-primary">Like</button>
                        </form>
                    @else
                        <form action="{{ route('posts.unlike', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">UnLike</button>
                        </form>
                    @endif
                @endauth
          </div>
        </div>
      </div>
    </div>




@endsection
