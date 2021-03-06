@extends('layout')

@section('title', 'Users')

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
            <th>Name</th>
            <th>E-mail</th>
            <th>E-mail verified</th>
            <th>Password</th>
            <th>Remember token</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->email_verified_at->diffforhumans() }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->remember_token }}</td>
                <td>{{ $user->created_at->diffforhumans() }}</td>
                <td>
                    <p><a class="btn btn-primary" href="{{ route('user-edit', $user->id) }}">Update</a></p>
                    <p><a class="btn btn-primary" href="{{ route('user-destroy', $user->id) }}">Delete</a></p>
                </td>
            </tr>
        @empty
            <tr>
                <th><p>no tags</p></th>
            </tr>
        @endforelse
    </table>
    @include('paginator', ['table' => $users])
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('user-create') }}">Add new user</a>
    </div>
@endsection
