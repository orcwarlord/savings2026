<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }
    /** Display a listing of users. */
    public function index()
    {
        $users = User::orderBy('id')->paginate(15);
        return view('users.index', compact('users'));
    }

    /** Show the form for creating a new user. */
    public function create()
    {
        return view('users.create');
    }

    /** Store a newly created user in storage. */
    public function store(Request $request)
    {
        $data = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'nullable|string',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('users.index');
    }

    /** Display the specified user. */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /** Show the form for editing the specified user. */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /** Update the specified user in storage. */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'nullable|string',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.show', $user);
    }

    /** Remove the specified user from storage. */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
