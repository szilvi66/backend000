<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OfferApiController extends Controller
{
    public function store(Request $request, Auto $auto)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:160',
            'phone' => 'nullable|string|max:60',
            'message' => 'nullable|string|max:2000',
        ]);

        try {
            if (env('MAIL_OFFER_TO')) {
                Mail::raw(
                    "Ajánlatkérés autóra: {$auto->marka} {$auto->modell} ({$auto->evjarat})\n\n" .
                    "Név: {$validated['name']}\nEmail: {$validated['email']}\nTelefon: " . ($validated['phone'] ?? '-') . "\n\n" .
                    "Üzenet:\n" . ($validated['message'] ?? '-'),
                    function ($mail) use ($validated, $auto) {
                        $mail->to(env('MAIL_OFFER_TO'))
                             ->subject("Ajánlatkérés: {$auto->marka} {$auto->modell}")
                             ->replyTo($validated['email'], $validated['name']);
                    }
                );
            }
        } catch (\Throwable $e) {
        }

        return response()->json(['message' => 'Ajánlatkérés elküldve.']);
    }
}
