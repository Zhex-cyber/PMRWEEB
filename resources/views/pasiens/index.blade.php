@extends('layouts.backend.app')
<title>Daftar Sakit</title>
@section('content')
<div class="container mt-5">
    <h3>Daftar Sakit</h3>

    <!-- Form Pencarian -->
    <form style="margin-left:25%" action="{{ route('pasiens.index') }}" method="GET" class="p-1 d-flex align-items-center">
        <input type="text" name="search" class="form-control" placeholder="Cari nama yang sakit..." value="{{ request()->input('search') }}" style="height: 38px;">
        <button type="submit" class="btn btn-success" style="margin-left: 5px; height: 38px; width:100px;">Cari</button>
        <!-- Tombol Tambah -->
        <a href="{{ route('pasiens.create') }}" class="btn btn-primary ml-2" style="margin-left: 5px; height: 38px; width:200px;">Tambah</a>
        <a href="{{ route('Daftar_Sakit_Sakit_PMR_SMKN1_Kawali.pdf') }}" class="btn btn-primary btn-sm" style="margin-left: 5px; height: 38px; width:250px;">Download Semua Data</a>
    </form>

    <!-- Tabel Daftar Pasien -->
    <table class="table table-bordered" id="pasienTable">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
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
                <td>
                    <a href="{{ route('pasiens.download', $pasien->id) }}" class="btn btn-success btn-sm">Download Data</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-3">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm">
                {{ $pasiens->onEachSide(1)->links() }}
            </ul>
        </nav>
    </div>
</div>
@endsection
