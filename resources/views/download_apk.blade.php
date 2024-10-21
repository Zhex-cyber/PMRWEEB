@extends('layouts.backend.app')
<title>Download APK | Absensi</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Download APK Absensi</div>

                <div class="card-body">
                    <p>Download aplikasi absensi untuk Android dengan menekan tombol di bawah ini:</p>
                    <a href="{{ route('download-apk.file') }}" class="btn btn-primary">Download APK</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
