<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with(['user', 'konsultasi', 'janjiTemu', 'resepObat'])->get();
        return response()->json($pembayarans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'resep_obat_id' => 'nullable|exists:resep_obat,id',
            'tipe_pembayaran' => 'required|in:konsultasi,janji_temu,obat',
            'metode_pembayaran' => 'required|in:transfer_bank,e_wallet,kartu_kredit,virtual_account',
            'provider_pembayaran' => 'required|string|max:50',
            'jumlah_bayar' => 'required|numeric|min:0',
            'biaya_admin' => 'numeric|min:0',
            'total_bayar' => 'required|numeric|min:0',
            'status_pembayaran' => 'in:pending,berhasil,gagal,expired',
            'kode_referensi' => 'nullable|string|max:100',
            'tanggal_bayar' => 'nullable|date',
            'bukti_pembayaran' => 'nullable|string|max:255',
            'catatan' => 'nullable|string'
        ]);

        $nomorTransaksi = 'TRX-' . date('YmdHis') . '-' . str_pad(Pembayaran::count() + 1, 3, '0', STR_PAD_LEFT);

        $pembayaran = Pembayaran::create([
            'user_id' => $request->user_id,
            'konsultasi_id' => $request->konsultasi_id,
            'janji_temu_id' => $request->janji_temu_id,
            'resep_obat_id' => $request->resep_obat_id,
            'nomor_transaksi' => $nomorTransaksi,
            'tipe_pembayaran' => $request->tipe_pembayaran,
            'metode_pembayaran' => $request->metode_pembayaran,
            'provider_pembayaran' => $request->provider_pembayaran,
            'jumlah_bayar' => $request->jumlah_bayar,
            'biaya_admin' => $request->biaya_admin ?? 0,
            'total_bayar' => $request->total_bayar,
            'status_pembayaran' => $request->status_pembayaran ?? 'pending',
            'kode_referensi' => $request->kode_referensi,
            'tanggal_bayar' => $request->tanggal_bayar,
            'bukti_pembayaran' => $request->bukti_pembayaran,
            'catatan' => $request->catatan
        ]);

        return response()->json($pembayaran->load(['user', 'konsultasi', 'janjiTemu', 'resepObat']), 201);
    }

    public function show(Pembayaran $pembayaran)
    {
        return response()->json($pembayaran->load(['user', 'konsultasi', 'janjiTemu', 'resepObat']));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'konsultasi_id' => 'nullable|exists:konsultasi,id',
            'janji_temu_id' => 'nullable|exists:janji_temu,id',
            'resep_obat_id' => 'nullable|exists:resep_obat,id',
            'tipe_pembayaran' => 'sometimes|in:konsultasi,janji_temu,obat',
            'metode_pembayaran' => 'sometimes|in:transfer_bank,e_wallet,kartu_kredit,virtual_account',
            'provider_pembayaran' => 'sometimes|string|max:50',
            'jumlah_bayar' => 'sometimes|numeric|min:0',
            'biaya_admin' => 'numeric|min:0',
            'total_bayar' => 'sometimes|numeric|min:0',
            'status_pembayaran' => 'in:pending,berhasil,gagal,expired',
            'kode_referensi' => 'nullable|string|max:100',
            'tanggal_bayar' => 'nullable|date',
            'bukti_pembayaran' => 'nullable|string|max:255',
            'catatan' => 'nullable|string'
        ]);

        $pembayaran->update($request->all());
        return response()->json($pembayaran->load(['user', 'konsultasi', 'janjiTemu', 'resepObat']));
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return response()->json(null, 204);
    }
}