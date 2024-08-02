<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $data = $request->only(['username', 'password']);
        
        if(Auth::attempt($data)){
            $user = Auth::user();
            return redirect()->route('user.show', ['id' => $user->id]);
        }else {
           return redirect()->back()->with('errorLogin', 'Account or password is incorrect.');
        }
    }
    
    public function register()
    {
        return view('admin.register');
    }
    public function postRegister(Request $request)
    {
        $data =  $request->all();
        User::query()->create($data);
        return redirect()->route('login')->with('message', 'Successfully');
    }
    public function logout()
    {
       Auth::logout();
       return redirect()->route('login');
    }
}
