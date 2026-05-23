<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    // ====================================
    // AUTÓK LISTÁJA (szűréssel)
    // ====================================
    public function index(Request $request)
    {
        // Szűrő listák (dropdownokhoz)
        $markak = Auto::query()
            ->whereNotNull('marka')->where('marka', '!=', '')
            ->distinct()->orderBy('marka')
            ->pluck('marka');

        $allapotok = Auto::query()
            ->whereNotNull('allapot')->where('allapot', '!=', '')
            ->distinct()->orderBy('allapot')
            ->pluck('allapot');

        $kivitelek = Auto::query()
            ->whereNotNull('kivitel')->where('kivitel', '!=', '')
            ->distinct()->orderBy('kivitel')
            ->pluck('kivitel');

        $szinek = Auto::query()
            ->whereNotNull('szin')->where('szin', '!=', '')
            ->distinct()->orderBy('szin')
            ->pluck('szin');

        // Lekérdezés + szűrés
        $query = Auto::query();

        if ($request->filled('marka')) {
            $query->where('marka', $request->marka);
        }

        if ($request->filled('allapot')) {
            $query->where('allapot', $request->allapot);
        }

        if ($request->filled('kivitel')) {
            $query->where('kivitel', $request->kivitel);
        }

        if ($request->filled('szin')) {
            $query->where('szin', $request->szin);
        }

        // Rendezés (kiemelt elöl)
        $autok = $query->orderByDesc('kiemelt')
                       ->orderByDesc('id')
                       ->get();

        return view('autok', compact(
            'autok',
            'markak',
            'allapotok',
            'kivitelek',
            'szinek'
        ));
    }

    // ====================================
    // KÜLÖN AUTÓ OLDAL
    // ====================================
    public function show(Auto $auto)
    {
        // Ez a fájl:
        // resources/views/cars/show.blade.php
        return view('cars.show', compact('auto'));
    }
}