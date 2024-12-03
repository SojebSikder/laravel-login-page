<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            if (!auth()->attempt($request->only('username', 'password'))) {
                return back()->with('success', 'Invalid credentials');
            }

            // if checked remember me
            if ($request->has('remember')) {
                auth()->login(auth()->user(), true);
            }

            $request->session()->regenerate();

            return redirect()->route('user.index');
        } catch (\Exception $e) {
            return back()->with('success', $e->getMessage());
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|username|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create($request->only('username', 'email', 'password'));

        return response()->json([
            'message' => 'Registration successful',
            'user' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
