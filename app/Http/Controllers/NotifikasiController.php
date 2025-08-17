<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        $notifikasis = Notifikasi::with('user')->get();
        return response()->json($notifikasis);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'judul' => 'required|string|max:255',
            'pesan' => 'required|string',
            'tipe_notifikasi' => 'required|in:konsultasi,janji_temu,pembayaran,resep,sistem',
            'data_referensi' => 'nullable|json',
            'is_read' => 'boolean'
        ]);

        $notifikasi = Notifikasi::create($request->all());
        return response()->json($notifikasi->load('user'), 201);
    }

    public function show(Notifikasi $notifikasi)
    {
        return response()->json($notifikasi->load('user'));
    }

    public function update(Request $request, Notifikasi $notifikasi)
    {
        $request->validate([
            'user_id' => 'sometimes|exists:users,id',
            'judul' => 'sometimes|string|max:255',
            'pesan' => 'sometimes|string',
            'tipe_notifikasi' => 'sometimes|in:konsultasi,janji_temu,pembayaran,resep,sistem',
            'data_referensi' => 'nullable|json',
            'is_read' => 'boolean'
        ]);

        $notifikasi->update($request->all());
        return response()->json($notifikasi->load('user'));
    }

    public function destroy(Notifikasi $notifikasi)
    {
        $notifikasi->delete();
        return response()->json(null, 204);
    }
}