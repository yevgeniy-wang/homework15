web.phpweb.php@extends('layout')

@section('title', 'Category')

@section('content')
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                   value="{{ @old('title', $category->title ?? null) }}">
        </div>
        @if ($errors->has('title'))
            @foreach($errors->get('title') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug"
                   value="{{ @old('slug', $category->slug ?? null) }}">
        </div>
        @if ($errors->has('slug'))
            @foreach($errors->get('slug') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        @csrf

        <div class="mb-3">
            <input type="submit" class="btn btn-primary mb-3" value="Save">
        </div>
    </form>
@endsection
