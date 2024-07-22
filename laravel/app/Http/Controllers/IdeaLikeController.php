<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $id) {
        $liker = auth()->user();

        if (!$liker->likes->contains($id)) {
            $liker->likes()->attach($id);
            return redirect()->back()->with('success', 'Liked successfully!');
        }

        return redirect()->back()->with('message', 'You have already liked this idea.');
    }

    public function unlike(Idea $id) {
        $liker = auth()->user();

        if ($liker->likes->contains($id)) {
            $liker->likes()->detach($id);
            return redirect()->back()->with('success', 'Unliked successfully!');
        }

        return redirect()->back()->with('message', 'You have not liked this idea.');
    }
}
