<?php

namespace App\Http\Controllers;

use App\Models\DropPoint; // 1. Tambahkan baris ini untuk mengimpor Model
use Illuminate\Http\Request;

class DropPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 2. Isi fungsi index dengan logika ini
        $dropPoints = DropPoint::all();
        return view('drop-points.index', compact('dropPoints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drop-points.create');
    }

     public function store(Request $request)
     {
         $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'operating_hours' => 'required|string|max:255',
        ]);


        $dropPoint = new DropPoint();
        $dropPoint->name = $request->name;
        $dropPoint->address = $request->address;
        $dropPoint->operating_hours = $request->operating_hours;
        $dropPoint->save();

        return redirect()->route('drop-points.index')
                         ->with('success', 'Drop point baru berhasil ditambahkan.');
     }

      public function show(string $id)
    {
        // Biarkan kosong dulu
    }

      public function edit(string $id)
    {

         $dropPoint = DropPoint::findOrFail($id);
         return view('drop-points.edit', compact('dropPoint'));
    }

    public function update(Request $request, string $id)
{
    // 1. Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'operating_hours' => 'required|string|max:255',
    ]);

    // 2. Cari data yang akan di-update
    $dropPoint = DropPoint::findOrFail($id);

    // 3. Update data dengan nilai baru dari form
    $dropPoint->name = $request->name;
    $dropPoint->address = $request->address;
    $dropPoint->operating_hours = $request->operating_hours;

    // 4. Simpan perubahan
    $dropPoint->save();

    // 5. Redirect kembali ke halaman daftar dengan pesan sukses
    return redirect()->route('drop-points.index')
                     ->with('success', 'Data drop point berhasil diperbarui.');
}

    public function destroy(string $id)
{
    // 1. Cari data berdasarkan ID
    $dropPoint = DropPoint::findOrFail($id);

    // 2. Hapus data dari database
    $dropPoint->delete();

    // 3. Redirect kembali dengan pesan sukses
    return redirect()->route('drop-points.index')
                     ->with('success', 'Data drop point berhasil dihapus.');
}
}

