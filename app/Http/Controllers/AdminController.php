<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Login Successfully',
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
}