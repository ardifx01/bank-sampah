<x-app-layout>
    <h1 class="h3 mb-4 text-gray-800">Daftar Lokasi Drop Point</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Temukan Lokasi Terdekat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jam Operasional</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dropPoints as $dropPoint)
                            <tr>
                                <td>{{ $dropPoint->name }}</td>
                                <td>{{ $dropPoint->address }}</td>
                                <td>{{ $dropPoint->operating_hours }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Admin belum menambahkan data drop point.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>