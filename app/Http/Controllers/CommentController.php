<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Auto;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // Autóhoz tartozó kommentek listázása
    public function index(Auto $auto)
    {
        $comments = $auto->comments()
            ->with('user')
            ->latest()
            ->get();

        return view('comments.index', compact('comments', 'auto'));
    }

    // Komment mentése adott autóhoz
    public function store(Request $request, Auto $auto)
    {
        $request->validate([
            'content' => 'required|min:3'
        ]);

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Be kell jelentkezned!');
        }

        $auto->comments()->create([
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('message', 'Komment elküldve!');
    }
}