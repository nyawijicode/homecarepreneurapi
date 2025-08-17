<?php

namespace App\Http\Controllers;

use App\Models\ChatKonsultasi;
use Illuminate\Http\Request;

class ChatKonsultasiController extends Controller
{
    public function index()
    {
        $chats = ChatKonsultasi::with(['konsultasi', 'pengirim'])->get();
        return response()->json($chats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'konsultasi_id' => 'required|exists:konsultasi,id',
            'pengirim_id' => 'required|exists:users,id',
            'tipe_pesan' => 'required|in:text,image,file',
            'isi_pesan' => 'nullable|string',
            'file_path' => 'nullable|string|max:255',
            'is_read' => 'boolean'
        ]);

        $chat = ChatKonsultasi::create($request->all());
        return response()->json($chat->load(['konsultasi', 'pengirim']), 201);
    }

    public function show(ChatKonsultasi $chatKonsultasi)
    {
        return response()->json($chatKonsultasi->load(['konsultasi', 'pengirim']));
    }

    public function update(Request $request, ChatKonsultasi $chatKonsultasi)
    {
        $request->validate([
            'konsultasi_id' => 'sometimes|exists:konsultasi,id',
            'pengirim_id' => 'sometimes|exists:users,id',
            'tipe_pesan' => 'sometimes|in:text,image,file',
            'isi_pesan' => 'nullable|string',
            'file_path' => 'nullable|string|max:255',
            'is_read' => 'boolean'
        ]);

        $chatKonsultasi->update($request->all());
        return response()->json($chatKonsultasi->load(['konsultasi', 'pengirim']));
    }

    public function destroy(ChatKonsultasi $chatKonsultasi)
    {
        $chatKonsultasi->delete();
        return response()->json(null, 204);
    }
}