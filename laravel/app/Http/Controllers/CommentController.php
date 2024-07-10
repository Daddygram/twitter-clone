<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $id) {

       $comment = new Comment();
       $comment->idea_id = $id->id;
       $comment->content = request()->get('content');
       $comment->save();


       return redirect()->route('idea.show', $id->id)->with('success','Comment posted successfully!');
    }
}
