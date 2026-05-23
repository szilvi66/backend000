<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentAdminController extends Controller
{
    public function destroy(Comment $comment)
    {
        $comment->delete(); //  DB-ből törlés
        return back()->with('success', 'Komment törölve.');
    }
}