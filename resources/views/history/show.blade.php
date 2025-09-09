<x-app-layout>
    <h1 class="h3 mb-2 text-gray-800">Detail Transaksi</h1>
    <p class="mb-4">Transaksi pada tanggal: {{ \Carbon\Carbon::parse($collection->collection_date)->format('d F Y') }}</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rincian Sampah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Jenis Sampah</th>
                            <th>Berat (kg)</th>
                            <th>Poin Didapat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection->details as $detail)
                            <tr>
                                <td>{{ $detail->waste_type }}</td>
                                <td>{{ $detail->weight_in_kg }}</td>
                                <td>{{ number_format($detail->weight_in_kg * $detail->points_per_kg) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold">
                            <td colspan="2" class="text-right">Total Poin dari Transaksi Ini:</td>
                            <td>{{ number_format($collection->total_points) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <a href="{{ route('history.index') }}" class="btn btn-secondary mt-3">Kembali ke Riwayat</a>
        </div>
    </div>
</x-app-layout>