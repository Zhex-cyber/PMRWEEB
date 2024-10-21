<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pasien</title>
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</head>
<body>
    <h3>Daftar Pasien</h3>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasiens as $pasien)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pasien->nis }}</td>
                <td>{{ $pasien->nama_lengkap }}</td>
                <td>{{ $pasien->kelas }}</td>
                <td>{{ $pasien->jurusan }}</td>
                <td>{{ $pasien->keterangan }}</td>
                <td>{{ $pasien->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
