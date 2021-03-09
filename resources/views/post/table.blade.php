@extends('layout')

@section('title', 'Posts')

@section('content')
    <div class="mb-3">
        <br>
        <a class="btn btn-secondary" href="{{ route('admin') }}">Back</a>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Tags</th>
            <th>Body</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        @forelse($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td><a href="{{ route('posts-by-category', $post->category->id) }}">{{ $post->category->title }}</a>
                </td>
                <td><a href="{{ route('posts-by-author', $post->user->id) }}">{{ $post->user->name }}</a></td>
                <td>
                    <ul>@foreach($post->tags as $tag)
                            <li><a href="{{ route('posts-by-tag', $tag->id) }}">{{ $tag->title }}</a></li>@endforeach
                    </ul>
                </td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at->diffforhumans() }}</td>
                <td>
                    <p><a class="btn btn-primary" href="{{ route('post-edit', $post->id) }}">Edit</a></p>
                    <p><a class="btn btn-primary" href="{{ route('post-destroy', $post->id) }}">Delete</a></p>
                </td>
            </tr>

        @empty
            <tr>
                <th><p>no posts</p></th>
            </tr>
        @endforelse
    </table>
    @include('paginator', ['table' => $posts])
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('post-create') }}">Add new post</a>
    </div>
    @include('auth')
@endsection
