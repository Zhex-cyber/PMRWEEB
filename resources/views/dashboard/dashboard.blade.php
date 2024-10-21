@extends('layouts.backend.app')

@section('content')
<style>
    .logout {
        position: absolute;
        color: white;
        font-size: 30px;
        text-decoration: none;
        right: 8px;
    }

    .logout:hover {
        color: white;
    }

    .image-listview>li .item {
        min-height: 80px !important;
        border-radius: 20px !important;
    }

    .bottom-nav {
        position: fixed;
        bottom: 0;
        width: 100%;
        background-color: #f8f9fa;
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
        box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);
    }

    .bottom-nav a {
        color: #007bff;
        text-align: center;
        font-size: 24px;
        text-decoration: none;
    }

    .bottom-nav a:hover {
        color: #0056b3;
    }

    .bottom-nav .nav-icon {
        display: block;
        font-size: 24px;
    }

    .bottom-nav .nav-label {
        font-size: 12px;
    }

    .appBottomMenu .item {
        text-align: center;
        color: #6c757d;
        padding: 10px 0;
    }

    .appBottomMenu .item.active {
        color: #007bff;
    }

    .action-button.large {
        background-color: #007bff;
        color: white;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<!-- App Capsule -->
<div id="appCapsule">
    <div class="section" id="user-section">
        <a href="/proseslogout" class="logout">
            <ion-icon name="exit-outline"></ion-icon>
        </a>
        <div id="user-detail">
            <div class="avatar">
                @php
                    $user = Auth::user(); // Ambil data pengguna yang sedang login
                    $foto_profile = $user && $user->foto_profile ? Storage::url('public/images/profile/' . $user->foto_profile) : asset('Assets/Backend/images/user.png');
                @endphp

                @if (!$user || !$user->foto_profile)
                    <img class="round" src="{{ asset('Assets/Backend/images/user.png') }}" alt="avatar" height="80" width="80">
                @else
                    <img src="{{ $foto_profile }}" id="account-upload-img" class="rounded mr-50" alt="profile image" height="80" width="80">
                @endif
            </div>
            <div id="user-info">
                <h2 id="user-name">{{ Auth::user()->nama_lengkap }}</h2>
                <span id="user-role">{{ Auth::user()->kelas_jurusan }}</span>
            </div>
        </div>
    </div>

    <div class="section" id="menu-section">
        <div class="card bg-grey">
            <div class="card-body d-flex align-items-center">
                <div class="item-menu text-center">
                    <img src="{{ asset('Assets/Frontend/img/logoabsensi.png') }}" style="width: 80px; height: 80px; border-radius: 50%;">
                </div>
                <div class="item-menu text-center ml-3">
                    <h3 class="font-weight-bold">ABSENSI PMR WIRA SMKN 1 KAWALI</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="section mt-2" id="presence-section">
        <div class="todaypresence">
            <div class="row">
                <div class="col-6">
                    <div class="card gradasigreen">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if ($absensihariini && $absensihariini->foto_in)
                                    @php
                                        $foto_in = Storage::url('uploads/absensi/' . $absensihariini->foto_in);
                                    @endphp
                                    <img src="{{ url($foto_in) }}" alt="" class="imaged w48">
                                    @else
                                    <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Masuk</h4>
                                    <span>{{ $absensihariini->jam_in ?? 'Belum Absen' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card gradasired">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if ($absensihariini && $absensihariini->foto_out)
                                    @php
                                        $foto_out = Storage::url('uploads/absensi/' . $absensihariini->foto_out);
                                    @endphp
                                    <img src="{{ url($foto_out) }}" alt="" class="imaged w48">
                                    @else
                                    <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Pulang</h4>
                                    <span>{{ $absensihariini->jam_out ?? 'Belum Absen' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="rekapabsensi">
            <h3>Rekap Absensi Bulan {{ $namabulan[$bulanini] ?? 'Bulan Ini' }} Tahun {{ $tahunini }}</h3>
            <div class="row">
                @php
                    $rekapData = [
                        ['icon' => 'accessibility-outline', 'label' => 'Hadir', 'count' => $rekapabsensi->jmlhadir, 'color' => 'primary'],
                        ['icon' => 'newspaper-outline', 'label' => 'Izin', 'count' => $rekapizin->jmlizin, 'color' => 'success'],
                        ['icon' => 'medkit-outline', 'label' => 'Sakit', 'count' => $rekapizin->jmlsakit, 'color' => 'warning'],
                        ['icon' => 'alarm-outline', 'label' => 'Telat', 'count' => $rekapabsensi->jmlterlambat ?? 0, 'color' => 'danger'],
                    ];
                @endphp

                @foreach ($rekapData as $data)
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding: 12px;">
                            <span class="badge bg-danger" style="position: absolute; top:3px; right:10px; font-size:0.6rem;">{{ $data['count'] }}</span>
                            <ion-icon name="{{ $data['icon'] }}" style="font-size: 1.6rem;" class="text-{{ $data['color'] }} mb-1"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500">{{ $data['label'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="bottom-nav">
        <a href="/dashboard">
            <ion-icon name="home-outline" class="nav-icon"></ion-icon>
            <span class="nav-label">Home</span>
        </a>
        <a href="/absensi">
            <ion-icon name="calendar-outline" class="nav-icon"></ion-icon>
            <span class="nav-label">Absensi</span>
        </a>
        <a href="/profil">
            <ion-icon name="person-outline" class="nav-icon"></ion-icon>
            <span class="nav-label">Profil</span>
        </a>
    </div>
</div>
<!-- * App Capsule -->

<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="/dashboard" class="item {{ request()->is('dashboard') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Home</strong>
        </div>
    </a>
    <a href="/absensi/histori" class="item {{ request()->is('absensi/histori') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated" aria-label="document text outline"></ion-icon>
            <strong>Histori</strong>
        </div>
    </a>
    <a href="/absensi/create" class="item {{ request()->is('absensi/create') ? 'active' : '' }}">
        <div class="col">
            <div class="action-button large">
                <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="/absensi/izin" class="item {{ request()->is('absensi/izin') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="calendar-outline"></ion-icon>
            <strong>Izin</strong>
        </div>
    </a>
    <a href="/editprofile" class="item {{ request()->is('editprofile') ? 'active' : '' }}">
        <div class="col">
            <ion-icon name="people-outline" role="img" class="md hydrated" aria-label="people outline"></ion-icon>
            <strong>Profile</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->

@endsection
