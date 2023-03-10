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
        $users = UserResource::collection(User::all());

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
            'password' => 'required|string|min:8|max:16',
            'is_admin' => 'required'
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
        return inertia('User/Edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'employee_number' => 'required|string|max:255',
            'is_admin' => 'required'
        ]);

        $user->update($validated);

        request()->session()->flash('flash.banner', 'Usuario actualizado');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        //
    }

    public function toggleActivation(Request $request, User $user)
    {
        $user->update(['is_active' => $request->is_active]);
    }



}
