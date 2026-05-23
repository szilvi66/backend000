<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CommentApiController extends Controller
{
    // Csak az adott autó kommentjei (GET: publikus)
    public function index(Auto $auto)
    {
        $query = Comment::with('user:id,username,first_name,last_name,profile_image')
            ->where('auto_id', $auto->id);

        if (Schema::hasColumn('comments', 'status')) {
            $query->where('status', 'approved');
        }

        $comments = $query->latest()->get();

        return response()->json($comments);
    }

    // Komment mentése adott autóhoz (POST: JWT kell)
    public function store(Request $request, Auto $auto)
    {
        $request->validate([
            'content' => 'required|string|min:2|max:2000',
        ]);

        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Nincs bejelentkezve.'
            ], 401);
        }

        $comment = Comment::create([
            'user_id' => $user->id,
            'auto_id' => $auto->id,
            'content' => $request->content,
        ])->load('user:id,username,first_name,last_name,profile_image');

        return response()->json([
            'message' => 'Komment mentve ✅',
            'comment' => $comment
        ], 201);
    }
}