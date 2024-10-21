@extends('layouts.Frontend.app')

@section('title')
    Kegiatan - {{$kegiatan->nama}}
@endsection

@section('content')

@section('about')
    <div class="berita-page-area py-5">
        <div class="container">
            <!-- Judul Kegiatan -->
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="display-4 font-weight-bold">{{$kegiatan->nama}}</h1>
                    <p class="text-muted">Dipublikasikan pada: {{ \Carbon\Carbon::parse($kegiatan->created_at)->translatedFormat('d F Y') }}</p>
                </div>
            </div>

            <!-- Konten dan Gambar Kegiatan -->
            <div class="row align-items-center">
                <!-- Konten Kegiatan -->
                <div class="col-lg-7 col-md-6 col-sm-12 mb-4">
                    <div class="berita-content">
                        <p class="lead">{!! nl2br(e($kegiatan->content)) !!}</p>
                    </div>
                </div>

                <!-- Gambar Kegiatan -->
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="berita-img-holder position-relative">
                        <img src="{{asset('storage/images/kegiatan/' .$kegiatan->image)}}" class="img-fluid rounded shadow-lg" alt="{{$kegiatan->nama}}">
                    </div>
                </div>
            </div>

            <!-- Kutipan atau Highlight (Opsional) -->
            <div class="row mt-5">
                <div class="col-12">
                    <blockquote class="blockquote text-center p-4 border-left border-primary">
                        <p class="mb-0 font-italic">"Kegiatan {{$kegiatan->nama}} merupakan salah satu kegiatan yang paling berkesan tahun ini."</p>
                        <footer class="blockquote-footer">Panitia Penyelenggara</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>

    <!-- Styling tambahan -->
    <style>
        .berita-page-area {
            background-color: #f1f1f1;
        }
        h1.display-4 {
            font-size: 3rem;
            color: #343a40;
        }
        .berita-content p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.6;
        }
        .berita-img-holder img {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .berita-img-holder:hover img {
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }
        blockquote {
            background: #f9f9f9;
            border-left: 5px solid #007bff;
            padding: 20px;
        }
        blockquote p {
            font-size: 1.25rem;
            color: #333;
        }
        blockquote footer {
            font-size: 1rem;
            color: #777;
        }
    </style>
@endsection

@endsection
