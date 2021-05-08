<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic;

class ProfileController extends Controller
{

    // PROFILE DISPLAY PAGE
    public function index()
    {
        $data = auth()->user();
        return view('profile.index', [
            'data' => $data
        ]);
    }

    public function details()
    {
        $data = auth()->user();
        return view('profile.details', [
            'data' => $data
        ]);
    }

    public function credentials()
    {
        $data = auth()->user();
        return view('profile.credentials', [
            'data' => $data
        ]);
    }

    public function update(User $user, Request $request)
    {
        // 1. validation
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);
        $user->name = $request->name;
        $user->save();

        return redirect()->route('profile', $user);
    }

    // PROFILE UPDATE FUNCTION
    public function update_avatar(User $user, Request $request)
    {

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            ImageManagerStatic::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return redirect()->route('profile', $user);
    }
}
