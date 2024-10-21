@extends('layouts.Frontend.app')

@section('title')
    Detail Kegiatan - {{$kegiatan->nama}}
@endsection

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">{{$kegiatan->nama}}</h1>
        <div class="row">
            <!-- Bagian Gambar Kegiatan -->
            <div class="col-md-6">
                <img src="{{asset('storage/images/kegiatan/' . $kegiatan->image)}}" class="img-fluid rounded" alt="{{$kegiatan->nama}}">
            </div>
            <!-- Bagian Deskripsi Kegiatan -->
            <div class="col-md-6">
                <p>{!! nl2br(e($kegiatan->content)) !!}</p>
                <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($kegiatan->created_at)->format('d F Y') }}</p>
            </div>
        </div>
        <!-- Bagian Kegiatan Lainnya (Optional) -->
        <h3 class="mt-5">Kegiatan Lainnya</h3>
        <ul class="list-unstyled">
            @foreach ($kegiatanOther as $kegiatanItem)
                <li>
                    <a href="{{ route('detail.kegiatan', $kegiatanItem->slug) }}">
                        {{$kegiatanItem->nama}} - {{ \Carbon\Carbon::parse($kegiatanItem->created_at)->format('d F Y') }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
