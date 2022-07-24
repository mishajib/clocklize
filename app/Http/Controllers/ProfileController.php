<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $page_title = __('default.profile');
        $user       = Auth::user();
        return view('profile.index', compact('page_title', 'user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->except(['_token', 'image', 'email']);

        if ($request->has('image')) {
            $data['image'] = imageUploadHandler($request->file('image'), 'user-images', '256x256', $user->image);
        }

        $user->update($data);

        session()->flash('toast_success', __("default.module_updated_successfully", ['module' => __("default.profile")]));

        return back();
    }

    public function changePassword()
    {
        $page_title = __('default.reset_password');
        return view('profile.security', compact('page_title'));
    }

    public function updatePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'old_password' => 'required',
            'password'     => 'required|confirmed',
        ]);

        if ($validate->fails()) {
            session()->flash('toast_error', $validate->errors()->first());
            return back();
        }

        $hashedPassword = Auth::user()->getAuthPassword();
        if (!Hash::check($request->old_password, $hashedPassword)) {
            session()->flash('toast_error', __('default.current_password_not_matched'));
            return back();
        }
        if (Hash::check($request->password, $hashedPassword)) {
            session()->flash('toast_error', __("default.new_password_same_error_message"));
            return back();
        }
        $user           = User::findOrFail(Auth::id());
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'))->with('toast_success', __('default.module_updated_successfully', ['module' => __('default.password')]));
    }
}
