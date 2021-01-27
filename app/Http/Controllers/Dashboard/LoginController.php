<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\authAdmin;


class LoginController extends Controller
{
    // return login admin view
    public function login() {
        return view('dashboard.auth.login');
    }

    // login in the system
    public function checkLogin(authAdmin $request) {
        $remeber_me = $request->has('remember_me') ? TRUE : FALSE;
        if(auth()->guard('admin')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')] , $remeber_me)) {
            return redirect()->to(route('admin.dashboard'));
        }
        return redirect()->back()->with('error' , 'invalid authentication');
    }
}
