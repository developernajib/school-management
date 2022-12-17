<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    // Admin Login Controller
    public function AdminLogin()
    {
        return view("backend.admin.auth.admin_login");
    }

    public function AdminLoginStore(Request $request)
    {
        $check = $request->all();

        $notificationSuccess = array(
            'message' => "Admin Login Successfully",
            'alert-type' => 'success'
        );

        if (Auth::guard("admin")->attempt(["email" => $check["email"], "password" => $check["password"], "secret_code" => $check["secret_code"]])) {
            return redirect()->route("admin_dashboard")->with($notificationSuccess);
        } else {
            return back()->with("alert", "Email, Password or Secret Code is invalid.");
        }

        if (!(Auth::guard("admin")->attempt(["email" => $check["email"]]))) {
            return back()->with("alert", "Email doesn't exists on our database.");
        } else {
            return back()->with("alert", "Email or Password is invalid.");
        }
    }

    public function AdminLogout()
    {
        Auth::guard("admin")->logout();
        return redirect()->route("admin_login")->with("alert", "Admin Logout successfully.");
    }

    public function AdminRegister()
    {
        return view("backend.admin.auth.admin_register");
    }

    public function AdminRegisterStore(Request $request)
    {
        Admin::insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "secret_code" => "Test",
            "created_at" => Carbon::now(),
        ]);

        return redirect()->route("admin_login")->with("alert", "Admin Created Successfully");
    }
    // End Admin Login Controller


    // Admin Dashboard Controller
    public function AdminDashboard()
    {
        return view("backend.admin.dashboard.index");
    }

    // End Admin Dashboard Controller
}
