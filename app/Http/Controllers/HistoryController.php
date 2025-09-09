<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Collection;
class HistoryController extends Controller
{
    public function index()
{
    // Cek role pengguna yang sedang login
    if (Auth::user()->role == 'admin') {
        // JIKA ADMIN: Ambil semua data transaksi dari semua pengguna
        // Kita gunakan 'with('user')' agar bisa menampilkan nama pengguna di view
        $collections = Collection::with('user')->orderBy('collection_date', 'desc')->get();
    } else {
        // JIKA USER BIASA: Ambil hanya transaksi miliknya sendiri
        $user = Auth::user();
        $collections = $user->collections()->orderBy('collection_date', 'desc')->get();
    }

    return view('history.index', compact('collections'));
}

    public function show(Collection $collection)
{
    // Fitur Keamanan: Pastikan pengguna hanya bisa melihat riwayat miliknya sendiri
    if ($collection->user_id !== Auth::id()) {
        abort(403); // Tampilkan halaman 'Forbidden' jika mencoba akses data orang lain
    }

    return view('history.show', compact('collection'));
}
}