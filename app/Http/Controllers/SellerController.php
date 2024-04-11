<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Laravolt\Avatar\Avatar;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['Seller Confirmation', true, route('admin.seller.index')],
            ['Index', false],
        ];
        $title = 'All Seller';
        $users = User::where('role', 'seller')->orderBy('status', 'ASC')->get();
        return view('admin.seller.index', compact('breadcrumbs', 'title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['Seller Confirmation', true, route('admin.seller.index')],
            ['Create', false],
        ];
        $title = 'Create Seller';
        return view('admin.seller.create', compact('breadcrumbs', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => now()
            ]);
            $image = 'picture/' . $user->id . '.png';

            $avatar = new Avatar();

            $avatar->create($user->name)->save('uploads/' . $image);

            $user->update(['profile_photo' => $image]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect()->route('admin.seller.create')->with(['color' => 'bg-success-500', 'message' => __('seller.success.store')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $breadcrumbs = [
            ['Seller Confirmation', true, route('admin.seller.index')],
            [$user->name, false],
        ];
        $title = $user->name;
        $editable = false;
        return view('admin.seller.edit', compact('breadcrumbs', 'title', 'user', 'editable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $seller)
    {
        $breadcrumbs = [
            ['Seller Confirmation', true, route('admin.seller.index')],
            [$seller->name, false],
        ];
        $title = $seller->name;
        $editable = false;
        return view('admin.seller.edit', compact('breadcrumbs', 'title', 'seller', 'editable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $seller)
    {
        $validated = $request->validate([
            'status' => ['required'],
        ]);


        if ($validated['status'] === '1') {
            $validated['status'] = true;
        } else {
            $validated['status'] = false;
        }

        try {
            DB::beginTransaction();

            $seller->update($validated);

            DB::commit();

            return redirect()->route('admin.seller.index')->with(['color' => 'bg-success-500', 'message' => __('seller.success.update')]);
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
