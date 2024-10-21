.
@extends('layouts.Frontend.app')

@section('title', 'Semua Kegiatan')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Semua Kegiatan</h1>

    <div class="row">
        @foreach ($kegiatanM as $kegiatan)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/images/kegiatan/' . $kegiatan->image) }}" class="card-img-top" alt="{{ $kegiatan->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kegiatan->nama }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($kegiatan->content, 100) }}</p>
                        <a href="{{ route('detail.kegiatan', $kegiatan->slug) }}" class="btn btn-primary">Detail Kegiatan</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Tanggal: {{ \Carbon\Carbon::parse($kegiatan->created_at)->format('d F Y') }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $kegiatanM->links() }}
    </div>
</div>
@endsection
