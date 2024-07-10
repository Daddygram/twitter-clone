<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index() {

        $ideas = Idea::orderBy('created_at', 'DESC');
        $search = request()->get('search', '');

        if(request()->has('search')) {
            $ideas = $ideas->where('tweet', 'like', '%'.$search.'%');
        };
        
        return view('Dashboard',
        [
            'ideas' => $ideas->paginate(5)
        ]
    );

    }
}
