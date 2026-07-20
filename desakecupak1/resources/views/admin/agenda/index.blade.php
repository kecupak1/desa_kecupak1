<!DOCTYPE html>
<html>
<head>
    <title>Admin Agenda Desa</title>
</head>
<body>
    <h1>Kelola Agenda Desa</h1>

    <!-- Form Tambah -->
    <form action="/admin/agenda" method="POST">
        @csrf
        <input type="text" name="judul" placeholder="Judul Agenda" required>
        <input type="date" name="tanggal" required>
        <input type="text" name="lokasi" placeholder="Lokasi" required>
        <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
        <button type="submit">Simpan Agenda</button>
    </form>

    <hr>

    <!-- Tabel Daftar Agenda -->
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendas as $agenda)
            <tr>
                <td>{{ $agenda->judul }}</td>
                <td>{{ $agenda->tanggal->format('d-m-Y') }}</td>
                <td>{{ $agenda->lokasi }}</td>
                <td>
                    <form action="/admin/agenda/{{ $agenda->id }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>