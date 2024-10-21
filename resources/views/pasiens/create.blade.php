@extends('layouts.backend.app')
<title>Tambah Daftar Sakit</title>

@section('content')
<div class="container mt-5">
    <h3>Tambah Pasien</h3>
    <form action="{{ route('pasiens.store') }}" method="POST">
        @csrf <!-- Token CSRF untuk keamanan form -->
        <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control" required>
                <option value="" disabled selected>Pilih Kelas</option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option value="" disabled selected>Pilih Jurusan</option>
                <option value="RPL 1">RPL 1</option>
                <option value="RPL 2">RPL 2</option>
                <option value="RPL 3">RPL 3</option>
                <option value="TKJ 1">TKJ 1</option>
                <option value="TKJ 2">TKJ 2</option>
                <option value="TKJ 3">TKJ 3</option>
                <option value="AKL 1">AKL 1</option>
                <option value="AKL 2">AKL 2</option>
                <option value="SK 1">SK 1</option>
                <option value="SK 2">SK 2</option>
                <option value="TKR 1">TKR 1</option>
                <option value="TKR 2">TKR 2</option>
                <option value="TKR 3">TKR 3</option>
                <option value="MP 1">MP 1</option>
                <option value="MP 2">MP 2</option>
                <option value="DPIB 1">DPIB 1</option>
                <option value="DPIB 2">DPIB 2</option>
            </select>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="" disabled selected>Pilih Status</option>
                <option value="Pulang">Pulang</option>
                <option value="Balik ke kelas">Balik ke kelas</option>
                <option value="Puskesmas/Rumah sakit">Puskesmas/Rumah Sakit</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
