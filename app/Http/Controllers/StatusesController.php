<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'store', 'destroy']);
    }
    public function store(Request $request)
    {
        $request->validate(['content' => 'required|max:255']);
        $user_id = Auth::id();
        Status::create([
            'user_id' => $user_id,
            'content' => $request->content
        ]);
        session()->flash('success', 'You have posted a new blog!');
        return back();
    }
    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', 'You have deleted a blog！');
        return back();
    }
}
