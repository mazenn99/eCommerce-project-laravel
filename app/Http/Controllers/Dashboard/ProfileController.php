<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProfileRequest;


class ProfileController extends Controller
{
    // return profile view
    public function editProfile() {
        return view('dashboard.profile.edit');
    }

    // update admin profile
    public function updateProfile(ProfileRequest $request) {
        try {
            auth('admin')->user()->update([
                'name'  => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->filled('password') ? bcrypt($request->input('password')) : auth()->user()->password,
            ]);
            return redirect()->back()->with(['success' => __('dashboard/general.successfully_saved')]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => $ex]);
        }
    }

}
