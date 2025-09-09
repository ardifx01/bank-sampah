<x-app-layout>
    <h1 class="h3 mb-4 text-gray-800">Catat Transaksi Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="user_id">Pilih Pengguna</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="">-- Pilih Pengguna --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} - ({{ $user->email }})</option>
                        @endforeach
                    </select>
                </div>

                <hr>
                <h5 class="mb-3">Detail Sampah</h5>

                <div class="form-group">
                    <label for="waste_type">Jenis Sampah</label>
                    <input type="text" class="form-control" name="waste_type" placeholder="Contoh: Botol Plastik" required>
                </div>

                <div class="form-group">
                    <label for="weight">Berat (kg)</label>
                    <input type="number" step="0.1" class="form-control" name="weight" placeholder="Contoh: 1.5" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </form>
        </div>
    </div>
</x-app-layout>