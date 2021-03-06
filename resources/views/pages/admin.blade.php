@extends('layout')

@section('title', 'Admin')

@section('content')

    <div class="mb-3">
        <a class="btn btn-secondary" href="{{ route('home') }}">Home</a>
    </div>
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('posts') }}">Posts</a>
    </div>
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('categories') }}">Categories</a>
    </div>
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('tags') }}">Tags</a>
    </div>
    @include('auth')
@endsection
