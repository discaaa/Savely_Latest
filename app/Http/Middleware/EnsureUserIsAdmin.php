<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware untuk memastikan hanya user dengan role 'admin' yang bisa mengakses rute tertentu.
 *
 * Middleware ini harus digunakan SETELAH middleware auth:sanctum,
 * karena membutuhkan user yang sudah ter-autentikasi.
 */
class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login dan memiliki role admin
        if (! $request->user() || ! $request->user()->isAdmin()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Akses ditolak. Hanya admin yang bisa mengakses resource ini.',
            ], 403);
        }

        return $next($request);
    }
}
