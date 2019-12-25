@extends('layouts.app')

@section('page-title')
Post show
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="content col-12">
            <a href="{{ route('posts.index') }}">Go back to list</a>
            <h2>
                {{ $post->title }} 
                @if((new Carbon\Carbon())->diffInMinutes($post->created_at) < 1 )
                    <span class="badge badge-info">New</span>
                @endif
            </h2>
            <div class="border p-2">
                <p>{{ $post->content }}</p>
            </div>
            
            <div class="text-muted">Added {{ $post->created_at->diffForHumans() }}</div>

            <hr/>

            <h3 >Comments</h3>

            @forelse($post->comments as $comment)
                <div class="card mb-2 bg-white text-dark w-70">
                    <div class="card-body">
                      <p class="card-text">{{ $comment->content }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        added {{$comment->created_at->diffForHumans()}}
                    </div>
                  </div>
            @empty  
                <p>There is not any comments yet</p>
            @endforelse

        </div>
    </div>
</div>
@endsection