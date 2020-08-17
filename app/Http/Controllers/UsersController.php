<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'create', 'store']);
    }

    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:56',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'avatar' => asset('images/default_avatar.jpg')
        ]);
        session()->flash('success', 'You have created your account, please check your email to activate it! ');
        return back();
    }

    public function activate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if ($user) {
            $user->update([
                'activated' => 1,
                'activation_token' => null,
            ]);
            session()->flash('success', 'You have successfully activated your account!');
            Auth::login($user);
            return redirect()->route('users.index');
        } else {
            session()->flash('warning', 'Your activation code is expired!');
        }
    }
}
