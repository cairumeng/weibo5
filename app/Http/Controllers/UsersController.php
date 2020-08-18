<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['only' => 'create', 'store']);
        $this->middleware('auth', ['edit', 'updateAvatar', 'update']);
    }

    public function index()
    {
        $statuses = Status::orderBy('update_at', 'desc')->paginate(20);
        return view('users.index', compact('statuses'));
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

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function uploadAvatar(Request $request)
    {
        $user = Auth::user();
        $this->authorize('update', $user);
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $avatar = $request->avatar;
        $avatarName = time() . Str::random(5) . '.' . $avatar->extension();
        Storage::disk('public')->putFileAs('/images', $avatar, $avatarName);
        $path = Storage::url('images/' . $avatarName);
        $user->update([
            'avatar' => $path
        ]);
        return compact('path');
    }

    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);
        if ($request->password) {
            $request->validate([
                'name' => 'required|max:56',
                'password' => 'required|min:8|confirmed'
            ]);
            $user->update([
                'name' => $request->name,
                'password' => bcrypt($request->password)
            ]);
        } else {
            $request->validate([
                'name' => 'required|max:56',
            ]);
            $user->update([
                'name' => $request->name,
            ]);
        }
        session()->flash('success', 'You have updated your info!');
        return back();
    }
}
