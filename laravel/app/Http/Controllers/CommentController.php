<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Idea $id) {

        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->idea_id = $id->id;
        $comment->user_id = auth()->id();
        $comment->content = $validatedData['content'];
        $comment->save();


        return redirect()->route('idea.show', $id->id)->with('success','Comment posted successfully!');
    }
}
