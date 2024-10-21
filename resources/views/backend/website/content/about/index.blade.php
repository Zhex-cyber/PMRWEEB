@extends('layouts.backend.app')

@section('title')
    Tentang
@endsection

@section('content')

    {{-- Alert Success/Error --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title">Tentang</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="row">
                {{-- Daftar Tentang --}}
                <div class="col-6">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Daftar Tentang</h4>
                        </div>
                        <div class="card-datatable">
                            <table class="table table-striped table-hover dt-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($about as $key => $abouts)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('storage/images/about/' . $abouts->image) }}" class="img-fluid" style="max-width: 50px; max-height:50px">
                                            </td>
                                            <td>{{ $abouts->is_active == '0' ? 'Aktif' : 'Tidak Aktif' }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('backend-about.edit', $abouts->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('about.hapus', $abouts->id) }}" method="POST" style="margin-left: 5px;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Tambah Tentang --}}
                <div class="col-6">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Tambah Tentang</h4>
                        </div>
                        <div class="card-body">
                            <form id="formTentang" action="{{ route('backend-about.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="image">Gambar</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" />
                                        <small class="text-danger">Disarankan background berwarna putih atau format .png.</small>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-6 mb-3">
                                        <label for="is_active">Status</label>
                                        <select name="is_active" class="form-control @error('is_active') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            <option value="0">Aktif</option>
                                            <option value="1">Tidak Aktif</option>
                                        </select>
                                        @error('is_active')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="title">Judul</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" />
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="desc">Deskripsi</label>
                                        <span class="text-danger">*</span>
                                        <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" rows="5"></textarea>
                                        @error('desc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-success"  onclick="test(event, 'formTentang')" type="submit" >Tambah</button>
                                        <a href="{{ route('backend-about.index') }}" class="btn btn-danger">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        function test(event, formId) {
            event.preventDefault(); // Mencegah form dari submit otomatis
            event.target.setAttribute('disabled', 'disabled'); // Disable tombol
            const form = document.getElementById(formId); // Ambil form berdasarkan ID
            form.submit(); // Submit form secara manual
        }
    </script>
    </div>
@endsection

