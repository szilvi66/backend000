<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Auto;
use Illuminate\Http\Request;

class AutoApiController extends Controller
{
    private function normalizeImage(?string $path): ?string
    {
        if (!$path) return null;
        $path = str_replace('\\', '/', trim($path));
        if ($path === '') return null;
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
            return $path;
        }
        return '/' . ltrim($path, '/');
    }

    private function mapAuto(Auto $auto): array
    {
        return [
            'id' => $auto->id,
            'marka' => $auto->marka,
            'modell' => $auto->modell,
            'evjarat' => $auto->evjarat,
            'kilometerora' => $auto->kilometerora,
            'ajtok_szama' => $auto->ajtok_szama,
            'uzemanyag' => $auto->uzemanyag,
            'teljesitmeny' => $auto->teljesitmeny,
            'kivitel' => $auto->kivitel,
            'allapot' => $auto->allapot,
            'szemelyek_szama' => $auto->szemelyek_szama,
            'szin' => $auto->szin,
            'sebessegvalto' => $auto->sebessegvalto,
            'hengerurtartalom' => $auto->hengerurtartalom,
            'raktaron' => $auto->raktaron,
            'ar' => $auto->ar,
            'kep' => $this->normalizeImage($auto->kep),
            'kep2' => $this->normalizeImage($auto->kep2),
            'kiemelt' => (int) ($auto->kiemelt ?? 0),
            'created_at' => $auto->created_at,
            'url' => '/autok/' . $auto->id,
        ];
    }

    public function index(Request $request)
    {
        $query = Auto::query();
        foreach (['marka','allapot','kivitel','szin'] as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->string($field));
            }
        }

        $autok = $query->orderByDesc('kiemelt')->orderByDesc('id')->get()->map(fn ($a) => $this->mapAuto($a));

        return response()->json([
            'data' => $autok,
            'filters' => [
                'markak' => Auto::query()->whereNotNull('marka')->where('marka', '!=', '')->distinct()->orderBy('marka')->pluck('marka'),
                'allapotok' => Auto::query()->whereNotNull('allapot')->where('allapot', '!=', '')->distinct()->orderBy('allapot')->pluck('allapot'),
                'kivitelek' => Auto::query()->whereNotNull('kivitel')->where('kivitel', '!=', '')->distinct()->orderBy('kivitel')->pluck('kivitel'),
                'szinek' => Auto::query()->whereNotNull('szin')->where('szin', '!=', '')->distinct()->orderBy('szin')->pluck('szin'),
            ],
        ]);
    }

    public function show(Auto $auto)
    {
        return response()->json($this->mapAuto($auto));
    }

    public function featured()
    {
        $cars = Auto::query()
            ->where('kiemelt', 1)
            ->orderByDesc('id')
            ->take(6)
            ->get()
            ->map(fn ($a) => $this->mapAuto($a));

        return response()->json($cars);
    }
}
