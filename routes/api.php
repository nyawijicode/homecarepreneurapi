<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpesialisasiController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ChatKonsultasiController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\DetailResepController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RiwayatMedisController;
use App\Http\Controllers\RatingDokterController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes (Authentication)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (Require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Authentication
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // User management
    Route::apiResource('users', UserController::class)->except(['store']);

    // Spesialisasi routes
    Route::apiResource('spesialisasi', SpesialisasiController::class);

    // Dokter routes
    Route::apiResource('dokter', DokterController::class);
    Route::get('/dokter/spesialisasi/{spesialisasi_id}', [DokterController::class, 'getBySpesialisasi']);
    Route::get('/dokter/verified', [DokterController::class, 'getVerifiedDokters']);

    // Pasien routes
    Route::apiResource('pasien', PasienController::class);
    Route::get('/pasien/user/{user_id}', [PasienController::class, 'getByUserId']);

    // Konsultasi routes
    Route::apiResource('konsultasi', KonsultasiController::class);
    Route::get('/konsultasi/pasien/{pasien_id}', [KonsultasiController::class, 'getByPasien']);
    Route::get('/konsultasi/dokter/{dokter_id}', [KonsultasiController::class, 'getByDokter']);
    Route::post('/konsultasi/{id}/complete', [KonsultasiController::class, 'completeKonsultasi']);
    Route::post('/konsultasi/{id}/cancel', [KonsultasiController::class, 'cancelKonsultasi']);

    // Chat konsultasi routes
    Route::apiResource('chat-konsultasi', ChatKonsultasiController::class);
    Route::get('/chat-konsultasi/konsultasi/{konsultasi_id}', [ChatKonsultasiController::class, 'getByKonsultasi']);

    // Janji temu routes
    Route::apiResource('janji-temu', JanjiTemuController::class);
    Route::get('/janji-temu/pasien/{pasien_id}', [JanjiTemuController::class, 'getByPasien']);
    Route::get('/janji-temu/dokter/{dokter_id}', [JanjiTemuController::class, 'getByDokter']);
    Route::get('/janji-temu/dokter/{dokter_id}/tanggal/{tanggal}', [JanjiTemuController::class, 'getByDokterAndDate']);
    Route::post('/janji-temu/{id}/complete', [JanjiTemuController::class, 'completeJanjiTemu']);
    Route::post('/janji-temu/{id}/cancel', [JanjiTemuController::class, 'cancelJanjiTemu']);

    // Obat routes
    Route::apiResource('obat', ObatController::class);
    Route::get('/obat/search/{keyword}', [ObatController::class, 'search']);

    // Resep obat routes
    Route::apiResource('resep-obat', ResepObatController::class);
    Route::get('/resep-obat/pasien/{pasien_id}', [ResepObatController::class, 'getByPasien']);
    Route::post('/resep-obat/{id}/use', [ResepObatController::class, 'useResep']);
    Route::post('/resep-obat/{id}/expire', [ResepObatController::class, 'expireResep']);

    // Detail resep routes
    Route::apiResource('detail-resep', DetailResepController::class);
    Route::get('/detail-resep/resep/{resep_id}', [DetailResepController::class, 'getByResep']);

    // Pembayaran routes
    Route::apiResource('pembayaran', PembayaranController::class);
    Route::get('/pembayaran/user/{user_id}', [PembayaranController::class, 'getByUser']);
    Route::post('/pembayaran/{id}/verify', [PembayaranController::class, 'verifyPembayaran']);
    Route::post('/pembayaran/{id}/reject', [PembayaranController::class, 'rejectPembayaran']);

    // Riwayat medis routes
    Route::apiResource('riwayat-medis', RiwayatMedisController::class);
    Route::get('/riwayat-medis/pasien/{pasien_id}', [RiwayatMedisController::class, 'getByPasien']);

    // Rating dokter routes
    Route::apiResource('rating-dokter', RatingDokterController::class);
    Route::get('/rating-dokter/dokter/{dokter_id}', [RatingDokterController::class, 'getByDokter']);

    // Notifikasi routes
    Route::apiResource('notifikasi', NotifikasiController::class);
    Route::get('/notifikasi/user/{user_id}', [NotifikasiController::class, 'getByUser']);
    Route::post('/notifikasi/{id}/read', [NotifikasiController::class, 'markAsRead']);
    Route::post('/notifikasi/mark-all-read', [NotifikasiController::class, 'markAllAsRead']);

    // Jadwal dokter routes
    Route::apiResource('jadwal-dokter', JadwalDokterController::class);
    Route::get('/jadwal-dokter/dokter/{dokter_id}', [JadwalDokterController::class, 'getByDokter']);
    Route::get('/jadwal-dokter/dokter/{dokter_id}/hari/{hari}', [JadwalDokterController::class, 'getByDokterAndDay']);
});

// Public routes (optional)
Route::get('/spesialisasi/list', [SpesialisasiController::class, 'listActive']);
Route::get('/dokter/list/verified', [DokterController::class, 'listVerified']);
Route::get('/obat/list/active', [ObatController::class, 'listActive']);