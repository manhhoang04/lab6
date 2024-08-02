<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.list', compact('users'));
    }

    public function toggleActive(User $user)
    {
        $user->active = !$user->active;
        $user->save();
        return back()->with('success', 'User status updated successfully.');
    }

}
