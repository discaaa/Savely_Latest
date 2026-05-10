<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Semua rute di file ini otomatis mendapat prefix '/api'.
| Contoh: Route::get('/login') -> diakses via GET /api/login
|
*/

// =============================================
// Rute Publik (tanpa autentikasi)
// =============================================
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// =============================================
// Rute Terproteksi (butuh token Sanctum)
// =============================================
Route::middleware('auth:sanctum')->group(function () {

    // Logout - hapus token yang sedang aktif
    Route::post('/logout', [AuthController::class, 'logout']);

    // Ambil data user yang sedang login
    Route::get('/user', function (Request $request) {
        return response()->json([
            'status' => 'success',
            'data'   => $request->user(),
        ]);
    });

    // ===========================================
    // Rute Khusus Admin (butuh role 'admin')
    // ===========================================
    Route::middleware('admin')->prefix('admin')->group(function () {

        // Contoh: Lihat semua user (hanya admin)
        Route::get('/users', function () {
            return response()->json([
                'status' => 'success',
                'data'   => \App\Models\User::all(),
            ]);
        });

    });

});
