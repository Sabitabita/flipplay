<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user->load('media');

        return new UserResource($user);
    }

    public function addToCollection(Request $request, User $user)
    {
        $validated = $request->validate([
            'media_id' => ['required', 'integer', 'exists:media,id'],
        ]);

        if ($user->media()->where('media_id', $validated['media_id'])->exists()) {
            return response()->json([
                'message' => 'Media sudah ada di koleksi pengguna',
            ], 409);
        }

        $user->media()->attach($validated['media_id']);
        $user->load('media');

        return response()->json([
            'message' => 'Media berhasil ditambahkan ke koleksi',
            'data' => new UserResource($user),
        ], 200);
    }

    public function removeFromCollection(User $user, Media $medium)
    {
        $user->media()->detach($medium->id);
        $user->load('media');

        return response()->json([
            'message' => 'Media berhasil dihapus dari koleksi',
            'data' => new UserResource($user),
        ], 200);
    }
}
