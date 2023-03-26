<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function profile()
    {
        $userId = Auth::user()->id;

        $getAdminById = User::find($userId);

        return view('admin.admin_profile_view', compact('getAdminById'));
    }

    public function editProfile(Request $request)
    {
        $data = $request->all();
        $userId = Auth::user()->id;
        $updateAdmin = User::find($userId);

        $updateAdmin->name = $data['name'];
        $updateAdmin->email = $data['email'];

        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');

            $fileName = date('YmdHi') . $userId . '.' . $image->getClientOriginalExtension();
            $filePath = 'upload/admin_images';
            $image->move(public_path($filePath), $fileName);
            $updateAdmin->profile_image = $fileName;
        }
        $updateAdmin->save();

        $notification = array(
            'message' => 'Updated Profile Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function changePassword()
    {

        return view('admin.admin_change_password');
    }

    public function updatePassword(Request $request)
    {
        $password = Auth::user()->password;
        $request->validate([
            'current_password' => ['required', Rules\Password::defaults()],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $checkedPassword = Hash::check($request->current_password, $password);

        if ($checkedPassword) {
            $getAdminById = User::find(Auth::id());
            $getAdminById->password = Hash::make($request->password);
            $getAdminById->save();

            $notification = array(
                'message' => 'Updated Password Successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Current Password dose not match.',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }
}