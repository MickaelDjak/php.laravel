@extends('layout')

@section('page-title')
Post create
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                @include('posts._form')
                <button type="submit" class="btn btn-primary btn-block">Complete</button>
            </form>
        </div>
    </div>
    <p class="text-muted">Post create</p>
@endsection