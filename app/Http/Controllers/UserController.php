<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'message' => 'Nincs bejelentkezett felhasználó'
            ], 401);
        }

        // régi kép törlése
        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
        }

        $path = $request->file('image')->store('profile_images', 'public');

        $user->profile_image = $path;
        $user->save();

        return response()->json([
            'message' => 'Profilkép frissítve',
            'path' => $path,
        ]);
    }
}
