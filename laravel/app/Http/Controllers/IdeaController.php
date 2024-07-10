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
        $editing = true;

        return view('idea.show', [
            'idea' => $id,
            'editing' => $editing
        ]);
    }

    public function update(Idea $id) {
        $validated = request()->validate([
            'tweet' => 'required|min:3|max:240'
        ]);

        $id->update($validated)

        return redirect()->route('idea.show', $id->id)->with("success", 'Idea updated successfully');
    }

    public function store() {

        $validated = request()->validate([
            'tweet' => 'required|min:3|max:240'
        ]);

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function destroy(Idea $id) {
        $id->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
