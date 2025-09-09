<x-app-layout>
    <h1 class="h3 mb-4 text-gray-800">Riwayat Transaksi Anda</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            @if(auth()->user()->role == 'admin')
                <th>Pengguna</th>
            @endif
            <th>Tanggal</th>
            <th>Total Poin</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($collections as $collection)
            <tr>
                @if(auth()->user()->role == 'admin')
                    <td>{{ $collection->user->name ?? 'User Dihapus' }}</td>
                @endif
                <td>{{ \Carbon\Carbon::parse($collection->collection_date)->format('d F Y') }}</td>
                <td>{{ number_format($collection->total_points) }} Poin</td>
                <td><span class="badge badge-success">{{ ucfirst($collection->status) }}</span></td>
                <td>
                    <a href="{{ route('history.show', $collection->id) }}" class="btn btn-info btn-sm">
                        Lihat Detail
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada riwayat transaksi.</td>
            </tr>
        @endforelse
    </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>