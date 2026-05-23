<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use Illuminate\Http\Request;

class AdminCarController extends Controller
{
    // ===== Feltöltő form =====
    public function create()
    {
        return view('admin.carcreate');
    }

    // ===== Autó mentése adatbázisba =====
    public function store(Request $request)
    {
        $data = $request->validate([
            'marka' => 'required|string|max:100',
            'modell' => 'required|string|max:100',
            'evjarat' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'kilometerora' => 'required|integer|min:0',
            'ajtok_szama' => 'required|integer|in:2,3,4,5',
            'uzemanyag' => 'required|string|max:50',
            'teljesitmeny' => 'required|integer|min:0|max:3000',
            'kivitel' => 'required|string|max:50',
            'allapot' => 'required|string|max:50',
            'szemelyek_szama' => 'required|integer|in:2,4,5',
            'szin' => 'required|string|max:50',
            'sebessegvalto' => 'required|string|max:50',
            'hengerurtartalom' => 'required|integer|min:0|max:10000',
            'raktaron' => 'required|integer|min:0',
            'ar' => 'required|integer|min:0',
            'kiemelt' => 'required|in:0,1',

            'image1' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',
            'image2' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',
        ]);

        // ===== Képek mentése storage-ba =====
        $path1 = $request->file('image1')->store('cars', 'public');
        $path2 = $request->file('image2')->store('cars', 'public');

        // ===== Adatbázis mentés =====
        Auto::create([
            'marka' => $data['marka'],
            'modell' => $data['modell'],
            'evjarat' => $data['evjarat'],
            'kilometerora' => $data['kilometerora'],
            'ajtok_szama' => $data['ajtok_szama'],
            'uzemanyag' => $data['uzemanyag'],
            'teljesitmeny' => $data['teljesitmeny'],
            'kivitel' => $data['kivitel'],
            'allapot' => $data['allapot'],
            'szemelyek_szama' => $data['szemelyek_szama'],
            'szin' => $data['szin'],
            'sebessegvalto' => $data['sebessegvalto'],
            'hengerurtartalom' => $data['hengerurtartalom'],
            'raktaron' => $data['raktaron'],
            'ar' => $data['ar'],
            'kiemelt' => $data['kiemelt'],
            'kep' => 'storage/' . $path1,
            'kep2' => 'storage/' . $path2,
        ]);

        return back()->with('success', 'Autó sikeresen feltöltve! 🚗');
    }

    // ===== Admin lista =====
    public function adminIndex()
    {
        $autok = Auto::orderByDesc('kiemelt')
            ->orderByDesc('id')
            ->get();

        return view('admin.cars_index', compact('autok'));
    }

    // ===== Raktár + kiemelt frissítés =====
    public function adminUpdate(Request $request, Auto $auto)
    {
        $data = $request->validate([
            'raktaron' => 'required|integer|min:0',
            'kiemelt'  => 'required|in:0,1',
        ]);

        $auto->update($data);

        return back()->with('success', 'Autó frissítve!');
    }

    // ===== Törlés =====
    public function adminDestroy(Auto $auto)
    {
        $auto->delete();

        return back()->with('success', 'Autó törölve!');
    }
}