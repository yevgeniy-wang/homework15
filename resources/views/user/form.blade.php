@extends('layout')

@section('title', 'Users')

@section('content')
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name"
                   value="{{ @old('name', $user->name ?? null) }}">
        </div>
        @if ($errors->has('name'))
            @foreach($errors->get('name') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email"
                   value="{{ @old('email', $user->email ?? null) }}">
        </div>
        @if ($errors->has('email'))
            @foreach($errors->get('email') as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        @if ($errors->has('password'))
            @foreach($errors->get('password') as $error)
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
