@extends('layout')

@section('page-title')
Post create
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}">
                @csrf
                @method('PUT')
                @include('posts._form')
                <button class='btn btn-primary btn-block' type='submit'>Complete</button>
            </form>
        </div>
    </div>
    <p class="text-muted">Post edit</p>
@endsection