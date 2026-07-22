<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Slider - Admin Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Kelola Slider / Banner Beranda</h2>
                    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary">+ Tambah Slider Baru</a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th width="20%">Gambar</th>
                                    <th>Judul & Deskripsi</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sliders as $key => $slider)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/' . $slider->gambar) }}" alt="Slider" class="img-thumbnail" style="width: 120px; height: 70px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <strong>{{ $slider->judul }}</strong>
                                        <p class="text-muted mb-0 small">{{ $slider->deskripsi }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus slider ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Belum ada data slider. Silakan tambahkan baru.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>