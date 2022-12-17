<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    public function AdminProfileView()
    {
        // $id = Auth::user()->id;
        $admin = Admin::find(1);
        return view("backend.admin.dashboard.profile.admin_profile_view", compact("admin"));
    }
    public function AdminProfileEdit()
    {
        // $id = Auth::user()->id;
        $editData = Admin::find(1);
        return view('backend.admin.dashboard.profile.admin_profile_edit', compact('editData'));
    }
    public function AdminProfileEditStore(Request $request)
    {
        // $id = Auth::user()->id;
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->updated_at = Carbon::now();

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin_profile_view')->with($notification);
    }


    // Password Update
    public function AdminPasswordView()
    {
        return view('backend.admin.dashboard.profile.admin_edit_password');
    }

    public function AdminPasswordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        // $hashedPassword = Auth::user()->password;
        $pass = Admin::find(1);
        $hashedPassword = $pass->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            // $admin = Admin::find(Auth::id());
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->updated_at = Carbon::now();
            $admin->save();
            Auth::logout();
            return redirect()->route('admin_login');
        } else {
            return redirect()->back();
        }
    }
}
