<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserRequest;
use App\Models\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $page_title = __('default.users');

        $month = $request->month ?? Carbon::now()->format('Y-m');
        $users = User::latest()->paginate(10);

        return view('users.index', compact('page_title', 'users', 'month'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $page_title = __('default.add_new_module', ['module' => Str::lower(__('default.user'))]);
        $roles      = User::$roles;

        return view('users.create', compact('page_title', 'roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->except(['_token', 'image', 'password', 'password_confirmation']);

        // Image upload manipulation
        if ($request->hasFile('image')) {
            $path          = imageUploadHandler($request->file('image'), 'user-images', '256x256');
            $data['image'] = $path;
        }

        // Password Hashing
        $data['password'] = Hash::make($request->password);

        // Create User
        User::create($data);


        sendFlash(__('default.module_added_successfully', ['module' => __('default.user')]));

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        $page_title = __('default.show_module', ['module' => __('default.user')]);

        return view('users.show', compact('page_title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $page_title = __('default.edit_module', ['module' => __('default.user')]);
        $roles      = User::$roles;

        return view('users.edit', compact('page_title', 'user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->except(['_token', '_method', 'image', 'password', 'password_confirmation']);

        // Image upload manipulation
        if ($request->hasFile('image')) {
            $path          = imageUploadHandler(
                $request->file('image'),
                'user-images',
                '256x256',
                $user->image
            );
            $data['image'] = $path;
        }

        // Password Hashing
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // Update User
        $user->update($data);

        sendFlash(__('default.module_updated_successfully', ['module' => __('default.user')]));

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->id == auth()->id()) {
            sendFlash(__("default.you_wont_delete_by_own"), 'toast_error');
            return back();
        }

        // Delete User Profile Image
        if (Storage::disk('public')->exists($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        $user->delete();

        sendFlash(__('default.module_deleted_successfully', ['module' => __('default.user')]));

        return redirect()->route('users.index');
    }

    public function reports(Request $request, User $user)
    {
        $page_title = __('default.monthly_report');

        $user->load('attendances');

        $month = $request->month ?? Carbon::now()->format('Y-m');

        $attendances = $user->attendances()->whereMonth('created_at', Carbon::parse($month)->format('m'))
            ->whereYear('created_at', Carbon::parse($month)->format('Y'))->latest()->with('user')->paginate(10);

        return view('users.reports', compact('page_title', 'attendances', 'month', 'user'));
    }
}
