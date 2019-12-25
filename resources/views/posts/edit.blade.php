@extends('layouts.app')

@section('page-title')
Post create
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 content">
            <form method="POST" action="{{ route('posts.update', ['post' => $post->id]) }}">
                @csrf
                @method('PUT')
                @include('posts._form')
                <button class='btn btn-primary btn-block' type='submit'>Update</button>
            </form>
            <p class="text-muted">Post edit</p>
        </div>
    </div>
</div>    
@endsection