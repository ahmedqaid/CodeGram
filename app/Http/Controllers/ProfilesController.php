<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);
        return view('profiles.index', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    { // Another way to receive user
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        $image_path  = request('image')->store('profile', 'public');
        $image = Image::make(public_path("storage/{$image_path}"))->fit(1000, 1000);
        $image->save();

        

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $image_path]
        ));

        return redirect("/profile/{$user->id}");
    }
}
