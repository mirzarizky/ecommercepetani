<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($role): View
    {
        return view('auth.register', ['title' => 'Register', 'role' => $role]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:customer,seller']
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

            event(new Registered($user));
            $image = 'picture/' . $user->id . '.png';

            $avatar = new Avatar();

            $avatar->create($user->name)->save('uploads/' . $image);

            $user->update(['profile_photo' => $image]);
            DB::commit();
            return redirect()->route('login.role', $request->role)->with(['color' => 'bg-success-500', 'message' => __('Registrasi berhasil silahkan login')]);
        } catch (Exception $e) {
            DB::rollback();
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
