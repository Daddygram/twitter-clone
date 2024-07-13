<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaLikeController extends Controller
{
    public function like(Idea $id) {
        $liker = auth()->user();

        $liker->likes()->attach($id);

        return redirect()->route('dashboard')->with('success', 'liked successfully!');
    }

    public function unlike(Idea $id) {
        $liker = auth()->user();

        $liker->likes()->detach($id);

        return redirect()->route('dashboard')->with('success', 'unliked successfully!');
    }
}
