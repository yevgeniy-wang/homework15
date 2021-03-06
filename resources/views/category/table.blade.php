@extends('layout')

@section('title', 'Categories')

@section('content')
    <div class="mb-3">
        <a class="btn btn-secondary" href="{{ route('admin') }}">Back</a>
    </div>

    @if (isset($_SESSION['message']))
        <div class="alert alert-{{ $_SESSION['message']['status'] }}" role="alert">
            {{ $_SESSION['message']['text'] }}
        </div>

        @unset ($_SESSION['message'])
    @endif

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Created at</th>
            <th>Actions</th>
        </tr>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->created_at->diffforhumans() }}</td>
                <td>
                    <p><a class="btn btn-primary" href="{{ route('category-edit', $category->id) }}">Update</a></p>
                    <p><a class="btn btn-primary" href="{{ route('category-destroy', $category->id) }}">Delete</a></p>
                </td>
            </tr>

        @empty
            <tr>
                <th><p>no categories</p></th>
            </tr>
        @endforelse
    </table>
    @include('paginator', ['table' => $categories])
    <div class="mb-3">
        <a class="btn btn-primary" href="/categories/create">Add new category</a>
    </div>
@endsection
