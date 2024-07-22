<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user) {
        $follower = auth()->user();

        if (!$follower->follows($user)) {
            $follower->followings()->attach($user->id);
            return redirect()->back()->with('success', 'Followed successfully!');
        }

        return redirect()->back()->with('message', 'You are already following this user.');
    }

    public function unfollow(User $user) {
        $follower = auth()->user();

        if ($follower->follows($user)) {
            $follower->followings()->detach($user->id);
            return redirect()->back()->with('success', 'Unfollowed successfully!');
        }

        return redirect()->back()->with('message', 'You are not following this user.');
    }
}
