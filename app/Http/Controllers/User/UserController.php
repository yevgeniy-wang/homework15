<?php


namespace App\Http\Controllers\User;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController
{
    public function list()
    {
        $users = User::paginate(15);
        $page = 'users';

        return view('user.table', compact('users', 'page'));
    }

    public function create()
    {
        return view('user.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'min:5', 'unique:users,name'],
            'email'    => ['required', 'email:rfc', 'unique:users,email'],
            'password' => ['required', 'min:5'],
        ]);

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $user = User::create($data);
        $user->remember_token = Str::random(10);
        $user->email_verified_at = now();
        $user->save();

        $_SESSION['message'] = [
            'status' => 'success',
            'text'   => "User \"{$user->name}\" successfully saved"
        ];

        return redirect()->route('users');
    }

    public function edit(User $user)
    {

        return view('user.form', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'min:5', 'unique:users,name,' . $user->id],
            'email'    => ['required', 'email:rfc', 'unique:users,email,' . $user->id],
            'password' => ['required', 'min:5'],
        ]);

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $user->update($data);

        $_SESSION['message'] = [
            'status' => 'success',
            'text'   => "User \"{$user->name}\" successfully saved"
        ];

        return redirect()->route('users');
    }

    public function destroy(User $user)
    {
        $user->delete();

        $_SESSION['message'] = [
            'status' => 'success',
            'text'   => "User \"{$user->name}\" successfully deleted"
        ];

        return redirect()->route('users');
    }

}
