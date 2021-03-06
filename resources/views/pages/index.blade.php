@extends('layout')

@section('title', 'Homepage')

@section('content')
    @foreach($posts as $post)
        <div class="mb-3">
            <h1>{{ $post->title }}</h1>
            <p><a href="{{ route('posts-by-category', $post->category->id) }}">{{ $post->category->title }}</a></p>
            <p><a href="{{ route('posts-by-author', $post->user->id) }}">{{ $post->user->name }}</a></p>
            <ul>
                @foreach($post->tags as $tag)
                    <li>
                        <a href="{{ route('posts-by-tag', $tag->id) }}">{{ $tag->title }}</a>
                    </li>
                @endforeach
            </ul>
            <p>{{ $post->body }}</p>
            <p>{{ $post->created_at->diffforhumans() }}</p>
        </div>
    @endforeach
    @include('paginator', ['table' => $posts])
    @include('auth')
@endsection
