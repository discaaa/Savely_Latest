<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    /**
     * Register user baru.
     *
     * Membuat akun user dengan role default 'user'.
     * Mengembalikan data user beserta API token untuk langsung bisa akses.
     */
    public function register(Request $request): JsonResponse
    {
        // Validasi input dengan aturan ketat
        $validated = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:50', 'unique:users,username'],
            'email'    => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed', Password::defaults()],
        ]);

        // Buat user baru (password otomatis di-hash oleh cast di model)
        $user = User::create([
            'username' => $validated['username'],
            'email'    => $validated['email'],
            'password' => $validated['password'],
        ]);

        // Buat API token untuk user yang baru register
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'  => 'success',
            'message' => 'Registrasi berhasil.',
            'data'    => [
                'user'  => $user,
                'token' => $token,
            ],
        ], 201);
    }

    /**
     * Login user.
     *
     * Memverifikasi kredensial (email + password).
     * Jika valid, mengembalikan API token untuk akses endpoint yang dilindungi.
     */
    public function login(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email'    => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $validated['email'])->first();

        // Cek apakah user ada dan password cocok
        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Email atau password salah.',
            ], 401);
        }

        // Buat token baru untuk sesi login ini
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'  => 'success',
            'message' => 'Login berhasil.',
            'data'    => [
                'user'  => $user,
                'token' => $token,
            ],
        ], 200);
    }

    /**
     * Logout user.
     *
     * Menghapus (revoke) token yang sedang digunakan,
     * sehingga token tersebut tidak bisa dipakai lagi untuk akses API.
     */
    public function logout(Request $request): JsonResponse
    {
        // Hapus token yang digunakan untuk request ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Logout berhasil. Token telah dihapus.',
        ], 200);
    }
}
