<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only' => ['create', 'store']]);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required|min:8'
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember_me)) {
            session()->flash('success', 'You have logged in!');
            return redirect()->route('users.index');
        } else {
            return back()->withErrors(['email' => 'Your email or password is not correct!']);
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'You have logged out!');
        return redirect()->route('home');
    }
}
