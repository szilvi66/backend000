<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserAdminController extends Controller
{
    public function destroy(User $user)
    {
        // ha vannak kommentjei, előbb töröljük
        if (method_exists($user, 'comments')) {
            $user->comments()->delete();
        }

        $user->delete(); //  DB-ből törlés

        return back()->with('success', 'Felhasználó törölve.');
    }
}