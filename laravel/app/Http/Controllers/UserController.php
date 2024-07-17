<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);

        return view('users.show', compact('user', 'ideas'));
    }

    public function edit(User $user)
    {
        Gate::authorize('update', $user);

        $editing = true;

        $ideas = $user->ideas()->paginate(5);

        return view('users.edit', compact('user', 'editing', 'ideas'));
    }

    public function update(Request $request, User $user)
    {
        Gate::authorize('update', $user);
        $validated = $request->validate([
            'name' => 'required|min:3|max:40|unique:users,name,'  . $user->id,
            'bio' => 'nullable|min:1|max:255',
            'image' => 'nullable|image'
        ]);

        
        if($request->has('image')){
            $imagePath = $request->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }
        $user->update($validated);

        return redirect()->route('profile');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
