<x-app-layout>
    <h1 class="h3 mb-4 text-gray-800">Edit Drop Point</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('drop-points.update', $dropPoint->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Drop Point</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $dropPoint->name }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ $dropPoint->address }}</textarea>
                </div>
                <div class="form-group">
                    <label for="operating_hours">Jam Operasional</label>
                    <input type="text" class="form-control" id="operating_hours" name="operating_hours" value="{{ $dropPoint->operating_hours }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>