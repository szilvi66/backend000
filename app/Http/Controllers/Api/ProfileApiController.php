<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileApiController extends Controller
{
    public function myComments(Request $request)
    {
        $user = auth('api')->user();

        return response()->json(
            Comment::with('auto:id,marka,modell')
                ->where('user_id', $user->id)
                ->latest()
                ->get()
                ->map(fn ($comment) => [
                    'id' => $comment->id,
                    'content' => $comment->content,
                    'created_at' => $comment->created_at,
                    'auto_nev' => trim(($comment->auto->marka ?? '') . ' ' . ($comment->auto->modell ?? '')),
                ])
        );
    }

    public function destroyMyComment(Request $request, Comment $comment)
    {
        $user = auth('api')->user();
        if ((int) $comment->user_id !== (int) $user->id) {
            return response()->json(['message' => 'Ehhez nincs jogosultságod.'], 403);
        }
        $comment->delete();
        return response()->json(['message' => 'Komment törölve.']);
    }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = auth('api')->user();
        if (!Hash::check($data['current_password'], $user->password)) {
            return response()->json(['message' => 'A jelenlegi jelszó hibás.'], 422);
        }

        $user->password = Hash::make($data['password']);
        $user->save();

        return response()->json(['message' => 'A jelszó sikeresen módosítva.']);
    }
}
