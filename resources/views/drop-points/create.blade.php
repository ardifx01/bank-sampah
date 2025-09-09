<x-app-layout>
    <h1 class="h3 mb-4 text-gray-800">Tambah Drop Point Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('drop-points.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Drop Point</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="operating_hours">Jam Operasional</label>
                    <input type="text" class="form-control" id="operating_hours" placeholder="Contoh: Senin - Jumat, 08:00 - 16:00" name="operating_hours" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</x-app-layout>