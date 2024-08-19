<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create()
    {
        $page_title = __('default.member_registration');

        return view('auth.register', compact('page_title'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profile_image' => 'bail|required|image',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $image = null;
        // Image upload manipulation
        if ($request->hasFile('profile_image')) {
            $path = imageUploadHandler($request->file('profile_image'), 'user-images', '256x256');
            $image = $path;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $image,
            'role' => 'member',
            'password' => Hash::make($request->password),
        ]);

        sendFlash(__('default.member_registered_successfully'));

        return redirect('/login');
    }
}
