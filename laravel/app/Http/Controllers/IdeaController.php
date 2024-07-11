<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $id) {

        return view('idea.show', [
            'idea' => $id
        ]);
    }

    public function edit(Idea $id) {
        if(auth()->id() !== $id->user_id){
            abort(404);
        }
        
        $editing = true;

        return view('idea.show', [
            'idea' => $id,
            'editing' => $editing
        ]);
    }

    public function update(Request $request, Idea $id) {
        if(auth()->id() !== $id->user_id){
            abort(404);
        }

        $validated = $request->validate([
            'tweet' => 'required|min:3|max:240'
        ]);

        $id->update($validated);

        return redirect()->route('idea.show', $id->id)->with("success", 'Idea updated successfully');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'tweet' => 'required|min:3|max:240'
        ]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function destroy(Idea $id) {
        if(auth()->id() !== $id->user_id){
            abort(404);
        }

        $id->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
