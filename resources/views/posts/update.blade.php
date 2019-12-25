@extends('layouts.app')

@section('page-title')
Post show
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">Post updated</div>
            <div>{{ $post->title }}</div>
            <div>{{ $post->content }}</div>
            <div>Updated {{ $post->updated_at->diffForHumans() }}</div>
            
        </div>
    </div>
@endsection