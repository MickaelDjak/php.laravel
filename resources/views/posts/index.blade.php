@extends('layout')

@section('page-title')
Post index
@endsection

@section('content')
    <div class="position-ref full-height">
        <div class="content">
            <h2>Post list</h2>
            @forelse($posts as $post)
            <hr/>
            <p>
                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class='post_link'>
                    <h3>
                        {{ $post->title }}
                       
                    </h3>
                </a>
                <span class="badge badge-danger">
                    @if($post->comments_count)
                        {{ $post->comments_count }} comments
                    @else 
                        No one comments
                    @endif 
                </span>     
                
                <div>
                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit</a>
                    <form class='post_delete' method='POST' action={{ route('posts.destroy', ['post' => $post->id]) }}>
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </p>
            @empty 
                <p>No one post present</p>
            @endforelse
        </div>
    </div>
@endsection