<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store', 'destroy']]);
    }

    public function store(User $user)
    {
        Auth::user()->follow($user);
        session()->flash('success', 'You have followed' . $user->name);
        return back();
    }
    public function destroy(User $user)
    {
        $this->authorize('unfollow', $user);
        Auth::user()->unfollow($user);
        session()->flash('success', 'You have unfollowed' . $user->name);
        return back();
    }
}
