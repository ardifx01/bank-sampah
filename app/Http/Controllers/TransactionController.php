<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Collection;
use App\Models\CollectionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Show the form for creating a new transaction.
     */
    public function create()
    {
        $users = User::all(); // Ambil semua data pengguna
        return view('transactions.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi data dari form
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'waste_type' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0.1',
        ]);

        // 2. Logika perhitungan poin (bisa Anda kembangkan nanti)
        // Misal: untuk sekarang kita anggap 1 kg = 1000 poin
        $pointsPerKg = 1000;
        $totalPoints = $request->weight * $pointsPerKg;

        // 3. Gunakan DB Transaction untuk memastikan semua query berhasil
        DB::transaction(function () use ($request, $totalPoints) {
            // A. Dapatkan data user yang dipilih
            $user = User::findOrFail($request->user_id);

            // B. Buat entri baru di tabel 'collections' (transaksi utama)
            $collection = Collection::create([
                'user_id' => $request->user_id,
                'drop_point_id' => 1, // Asumsi admin berada di drop point ID 1 (bisa dikembangkan)
                'collection_date' => now(),
                'total_points' => $totalPoints,
                'status' => 'completed',
            ]);

            // C. Buat entri baru di tabel 'collection_details' (rincian sampah)
            CollectionDetail::create([
                'collection_id' => $collection->id,
                'waste_type' => $request->waste_type,
                'weight_in_kg' => $request->weight,
                'points_per_kg' => 1000, // Samakan dengan logika di atas
            ]);

            // D. Update total poin milik user
            $user->points_balance += $totalPoints;
            $user->save();
        });

        // 4. Redirect kembali dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Transaksi berhasil disimpan!');
    }
}