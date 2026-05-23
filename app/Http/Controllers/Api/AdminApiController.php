<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Auto;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminApiController extends Controller
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

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $admin = Admin::where('email', $data['email'])->first();
        if (!$admin || !Hash::check($data['password'], $admin->password)) {
            return response()->json(['message' => 'Hibás email vagy jelszó.'], 401);
        }

        $token = Str::random(60);
        $admin->api_token = hash('sha256', $token);
        $admin->save();

        return response()->json([
            'token' => $token,
            'admin' => [
                'id' => $admin->id,
                'username' => $admin->username,
                'email' => $admin->email,
            ],
        ]);
    }

    public function stats()
    {
        return response()->json([
            'usersCount' => User::count(),
            'carsCount' => Auto::count(),
            'availableCars' => Auto::where('raktaron', '>', 0)->count(),
            'adminsCount' => Admin::count(),
        ]);
    }

    public function dashboard()
    {
        $latestComments = Comment::with(['user:id,username,first_name,last_name', 'auto:id,marka,modell'])
            ->latest()
            ->take(8)
            ->get()
            ->map(function ($comment) {
                $author = trim(($comment->user->first_name ?? '') . ' ' . ($comment->user->last_name ?? ''));
                if ($author === '') $author = $comment->user->username ?? 'Ismeretlen';
                return [
                    'id' => $comment->id,
                    'author' => $author,
                    'car_name' => trim(($comment->auto->marka ?? '') . ' ' . ($comment->auto->modell ?? '')),
                    'content' => $comment->content,
                    'created_at' => $comment->created_at,
                    'is_new' => now()->diffInDays($comment->created_at) <= 2,
                ];
            });

        return response()->json([
            'stats' => [
                'carsCount' => Auto::count(),
                'featuredCars' => Auto::where('kiemelt', 1)->count(),
                'usersCount' => User::count(),
                'commentsCount' => Comment::count(),
            ],
            'latest_comments' => $latestComments,
        ]);
    }

    public function users()
    {
        return response()->json([
            'data' => User::query()->latest()->get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'profile_image' => $user->profile_image,
                    'username' => $user->username,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'birthdate' => $user->birthdate,
                    'address' => $user->address,
                    'role' => 'user',
                    'created_at' => $user->created_at,
                ];
            }),
        ]);
    }

    public function cars()
    {
        return response()->json([
            'data' => Auto::query()->orderByDesc('kiemelt')->orderByDesc('id')->get()->map(function ($auto) {
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
                    'kiemelt' => (int) $auto->kiemelt,
                    'created_at' => $auto->created_at,
                ];
            }),
        ]);
    }

    public function storeCar(Request $request)
    {
        $data = $request->validate([
            'marka' => 'required|string|max:100',
            'modell' => 'required|string|max:100',
            'evjarat' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'kilometerora' => 'required|integer|min:0',
            'ajtok_szama' => 'required|integer',
            'uzemanyag' => 'required|string|max:50',
            'teljesitmeny' => 'required|integer|min:0|max:3000',
            'kivitel' => 'required|string|max:50',
            'allapot' => 'required|string|max:50',
            'szemelyek_szama' => 'required|integer',
            'szin' => 'required|string|max:50',
            'sebessegvalto' => 'required|string|max:50',
            'hengerurtartalom' => 'required|integer|min:0|max:10000',
            'raktaron' => 'required|integer|min:0',
            'ar' => 'required|integer|min:0',
            'kiemelt' => 'required|in:0,1',
            'image1' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',
            'image2' => 'required|image|mimes:jpg,jpeg,png,webp|max:8192',
        ]);

        $path1 = $request->file('image1')->store('cars', 'public');
        $path2 = $request->file('image2')->store('cars', 'public');

        $auto = Auto::create([
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

        return response()->json(['message' => 'Autó sikeresen feltöltve.', 'data' => $auto], 201);
    }

    public function updateCar(Request $request, Auto $auto)
    {
        $data = $request->validate([
            'raktaron' => 'required|integer|min:0',
            'kiemelt'  => 'required|in:0,1',
        ]);

        $auto->update($data);
        return response()->json(['message' => 'Autó frissítve.']);
    }

    public function destroyCar(Auto $auto)
    {
        $auto->delete();
        return response()->json(['message' => 'Autó törölve.']);
    }

    public function comments(Request $request)
    {
        $comments = Comment::with(['user:id,username,first_name,last_name', 'auto:id,marka,modell'])
            ->latest()
            ->paginate(10);

        $comments->getCollection()->transform(function ($comment) {
            $author = trim(($comment->user->first_name ?? '') . ' ' . ($comment->user->last_name ?? ''));
            if ($author === '') $author = $comment->user->username ?? 'Ismeretlen';

            return [
                'id' => $comment->id,
                'author' => $author,
                'car_name' => trim(($comment->auto->marka ?? '') . ' ' . ($comment->auto->modell ?? '')),
                'content' => $comment->content,
                'status' => $comment->status ?? 'approved',
                'created_at' => $comment->created_at,
            ];
        });

        return response()->json($comments);
    }

    public function approveComment(Comment $comment)
    {
        $comment->status = 'approved';
        $comment->save();
        return response()->json(['message' => 'Komment jóváhagyva.']);
    }

    public function rejectComment(Comment $comment)
    {
        $comment->status = 'rejected';
        $comment->save();
        return response()->json(['message' => 'Komment elutasítva.']);
    }

    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return response()->json(['message' => 'Komment törölve.']);
    }
}
