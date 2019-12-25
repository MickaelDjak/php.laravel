@extends('layouts.app')

@section('page-title')
Post create
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 content">
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                @include('posts._form')
                <button type="submit" class="btn btn-primary btn-block">Create</button>
            </form>
            <p class="text-muted">Post create</p>
        </div>
    </div>
    
</div>
@endsection