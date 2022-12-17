<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Moderator;

class ModeratorController extends Controller
{
    // Moderator Login Controller
    public function ModeratorLogin()
    {
        return view("backend.moderator.auth.moderator_login");
    }

    public function ModeratorLoginStore(Request $request)
    {
        $check = $request->all();
        if (Auth::guard("moderator")->attempt(["email" => $check["email"], "password" => $check["password"]])) {
            return redirect()->route("moderator_dashboard")->with("alert", "Moderator Login Successfully");
        }
        if (!(Auth::guard("moderator")->attempt(["email" => $check["email"]]))) {
            return back()->with("alert", "Email doesn't exists on our database.");
        } else {
            return back()->with("alert", "Email or Password is invalid.");
        }
    }

    public function ModeratorLogout()
    {
        Auth::guard("moderator")->logout();
        return redirect()->route("moderator_login")->with("alert", "Moderator Logout successfully.");
    }

    public function ModeratorRegister()
    {
        return view("backend.moderator.auth.moderator_register");
    }

    public function ModeratorRegisterStore(Request $request)
    {
        Moderator::insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "created_at" => Carbon::now(),
        ]);

        return redirect()->route("moderator_login")->with("alert", "Moderator Created Successfully");
    }
    // End Moderator Login Controller


    // Moderator Dashboard Controller

    public function ModeratorDashboard()
    {
        return view("backend.moderator.dashboard.index");
    }

    // End Admin Dashboard Controller
}
