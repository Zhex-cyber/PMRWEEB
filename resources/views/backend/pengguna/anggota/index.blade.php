@extends('layouts.backend.app')

@section('title')
    Anggota
@endsection

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @endif

<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Anggota</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Anggota</h4>
                                    <!-- Search Bar -->
                                    <form style="margin-left:46%" action="{{ route('backend-pengguna-anggota.index') }}" method="GET" class="d-flex align-items-center">
                                        <input type="text" name="search" class="form-control" placeholder="Cari nama anggota..." value="{{ request()->input('search') }}" style="height: 38px;">
                                        <button type="submit" class="btn btn-success" style="margin-left: 5px; height: 38px; width:100px;">Cari</button>
                                         <!-- Tombol Tambah -->
                                    <a href="{{ route('backend-pengguna-anggota.create') }}" class="btn btn-primary ml-2 " style="margin-left: 5px; height: 38px; width:200px;">Tambah</a>
                                    </form>

                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Nis</th>
                                                <th>Status</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($murid->isNotEmpty())
                                                @foreach ($murid as $key => $murids)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $murids->name }}</td>
                                                        <td>{{ $murids->nis }}</td>
                                                        <td>{{ $murids->status }}</td>
                                                        <td>{{ $murids->role == 'Guest' ? 'Calon Anggota' : 'Anggota' }}</td>
                                                        <td class="d-flex">
                                                            <a href="{{ route('backend-pengguna-anggota.edit', $murids->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                            <form id="form-delete-{{ $murids->id }}" action="{{ route('murid.hapus', $murids->id) }}" method="POST" style="margin-left: 5px;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $murids->id }}">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak ada anggota yang ditemukan</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Pagination berada di luar card-datatable -->
                <div class="d-flex justify-content-center" style="margin-top: -5px;">
                    {{ $murid->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
