@extends('layout')


@section('title', 'Posts')


@section('content')
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ @old('title', $post->title ?? null) }}">
        </div>
        @if ($errors->has('title'))
            @foreach($errors->get('title') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-control" id="category_id" name="category_id">
                <option selected disabled>Choose Category</option>
                @foreach($categories as $category)
                    <option @if($category->id == @old('category_id', $post->category_id ?? null)) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('category_id'))
            @foreach($errors->get('category_id') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <select class="form-control" id="tags" name="tags[]" multiple>
                <option disabled>Choose Tags</option>
                @foreach($tags as $tag)
                    <option @if(in_array($tag->id, @old('tags',$tag_ids ?? []) ?? [])) selected @endif value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('tags'))
            @foreach($errors->get('tags') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" name="body" cols="30" rows="10">{{ @old('body', $post->body ?? null) }}</textarea>
        </div>
        @if ($errors->has('body'))
            @foreach($errors->get('body') as $error)
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
    @include('auth')
@endsection
