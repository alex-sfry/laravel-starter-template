<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class SignupController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('auth.signup');
    }

    /**
     * @param Request $request
     * @return Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(6), 'confirmed'],
            'role' => ['nullable', Rule::in(['user', 'admin', ''])]
        ]);

        $validated['role'] = isset($validated['role']) ? $validated['role'] : 'user';

        $user = User::create($validated);

        Auth::login($user);

        return redirect('/');
    }
}
