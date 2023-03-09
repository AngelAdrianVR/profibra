<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = UserResource::collection(User::paginate(20));

        return inertia('User/Index', compact('users'));
    }

    public function create()
    {
        $password = Str::random(8);

        return inertia('User/Create', compact('password'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'employee_number' => 'required|string|max:255',
            'password' => 'required|string|min:8|max:16'
        ]);
       
        // encrypt password
        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        request()->session()->flash('flash.banner', 'Usuario creado. Recuerda brindarle la contraseña');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('user.index');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
