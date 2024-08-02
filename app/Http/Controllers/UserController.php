<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Lấy thông tin người dùng theo ID
        return view('admin.users', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('admin.updateprofile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $data = $request->except('avatar');
        $old_avatar = $user->avatar;

        // Cập nhật ảnh
        if ($request->hasFile('avatar')) {
            $path_avatar = $request->file('avatar')->store('images', 'public');
            $data['avatar'] = $path_avatar;
        }

        // Cập nhật dữ liệu
        $user->update($data);

        // Xóa ảnh cũ nếu có ảnh mới
        if ($request->hasFile('avatar') && isset($path_avatar)) {
            if (file_exists(storage_path('storage/' . $old_avatar))) {
                unlink(storage_path('storage/' . $old_avatar));
            }
        }

        return redirect()->back()->with('message', 'Successfully updated profile.');
    }
    public function changePassword(){
        $user = Auth::user();
        return view('admin.changepassword', compact('user'));
    }
    public function postChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Cập nhật mật khẩu mới
        $user->password = Hash::make($request->input('new_password'));
        $user->save();
        return redirect()->back()->with('message',  'Password changed successfully.');
    }
}
