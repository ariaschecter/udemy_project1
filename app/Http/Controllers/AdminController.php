<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'You\'re Successfully Log Out!',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } // End Method

    public function Profile() {
        $user = Auth::user();
        return view('admin.admin_profile_view', compact('user'));
    }

    public function EditProfile() {
        $user = Auth::user();
        return view('admin.admin_profile_edit', compact('user'));
    }

    public function StoreProfile(Request $request) {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'username' => ['required', Rule::unique('users')->ignore($user->id, 'id', 'username')],
            'profile_image' => 'file|image',
        ]);

        $data = $request->only(['name', 'username']);

        if($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['profile_image'] = $filename;
        }
        User::where('id', Auth::id())->update($data);

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePassword() {
        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request) {
        $request->validate([
            'oldPassword' => 'required',
            'password' => 'required',
            'passwordConfirmation' => 'required|same:password',
        ]);
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldPassword, $hashedPassword)) {
            User::where('id', Auth::id())->update([
                'password' => Hash::make($request->password)
            ]);
            session()->flash('message', 'Password Updated Successfully');
        } else {
            session()->flash('message', 'Old Password is not match');
        }
        return redirect()->back();
    }


}
