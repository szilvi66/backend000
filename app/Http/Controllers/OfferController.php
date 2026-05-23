<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OfferController extends Controller
{
    public function create(Auto $auto)
    {
        return view('offer.create', compact('auto'));
    }

    public function store(Request $request, Auto $auto)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:160',
            'phone' => 'nullable|string|max:60',
            'message' => 'nullable|string|max:2000',
        ]);

        Mail::send('emails.offer_request', [
            'auto' => $auto,
            'data' => $validated,
        ], function ($mail) use ($auto, $validated) {
            $mail->to(env('MAIL_OFFER_TO'))
                ->subject("Ajánlatkérés: {$auto->marka} {$auto->modell} ({$auto->evjarat})")
                ->replyTo($validated['email'], $validated['name']);
        });

        return back()->with('success', '✅ Ajánlatkérés elküldve!');
    }
}
