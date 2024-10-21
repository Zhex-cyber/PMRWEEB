<div id="header2" class="header4-area">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="header-top-left">
                        <div class="logo-area">
                            @if (@$footer->logo == NULL)
                            <img class="img-responsive" src="{{asset('Assets/Frontend/img/logo.ico')}}" alt="logo" style="height: 99px"">
                        @else
                            <img class="img-responsive" src="{{asset('storage/images/logo/' .$footer->logo)}}" alt="logo">
                        @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="header-top-right">
                        <ul>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:{{@$footer->telp}}"> {{@$footer->telp}} </a></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">{{@$footer->email}}</a></li>
                            <li>
                                @auth
                                    <a href="/home" class="apply-now-btn2">Home</a>
                                @else
                                    <a class="apply-now-btn2" href="{{route('login')}}"> Masuk</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area bg-primary" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <nav id="desktop-nav">
                        <ul>
                            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="/">Beranda</a></li>
                            <li><a href=" {{route('visimisi.sekolah')}} ">Visi dan Misi</a></li>
                            <style>

                                .thired-level {
                                    list-style: none;
                                    padding: 0;
                                    margin: 0;
                                    transition: all 0.3s ease;
                                    overflow: hidden; /* Untuk efek slide */
                                }

                            </style>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" id="kegiatanToggle">Kegiatan</a>
                                <ul class="thired-level" style="display: none;">
                                    @foreach ($kegiatanM as $kegiatans)
                                        <li><a href="{{ url('kegiatan', $kegiatans->slug) }}">{{ $kegiatans->nama }}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="{{ (request()->is('berita')) ? 'active' : '' }}"><a href=" {{route('berita')}} ">Berita</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area Start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li class="active"><a href="#">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a>
                                <ul>
                                    <li><a href=" {{route('profile.sekolah')}} ">Profile Sekolah</a></li>
                                    <li><a href=" {{route('visimisi.sekolah')}} ">Visi dan Misi</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Program</a>
                                <ul>
                                    <li class="has-child-menu"><a href="#">Kegiatan</a>
                                        <ul class="thired-level">
                                            @foreach ($kegiatanM as $kegiatans)
                                                <li><a href=" {{url('kegiatan', $kegiatans->slug)}} ">{{$kegiatans->nama}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ (request()->is('berita')) ? 'active' : '' }}"><a href=" {{route('berita')}} ">Berita</a></li>
                            <li class="{{ (request()->is('berita')) ? 'active' : '' }}"><a href=" {{route('berita')}} ">Galeri</a></li>
                            <li>
                                @auth
                                    <a href="">{{Auth::user()->name}}</a>
                                @else
                                    <a href=" {{route('login')}} ">Masuk</a>
                                @endauth
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area End -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mendapatkan elemen toggle dan menu
            const kegiatanToggle = document.getElementById('kegiatanToggle');
            const kegiatanMenu = kegiatanToggle.nextElementSibling;

            // Tambahkan event listener untuk efek slide
            kegiatanToggle.addEventListener('click', function (e) {
                e.preventDefault(); // Mencegah link melakukan navigasi

                // Toggle kelas 'show' dan kontrol display slide
                if (kegiatanMenu.style.display === 'none' || kegiatanMenu.style.display === '') {
                    kegiatanMenu.style.display = 'block'; // Tampilkan dengan slide
                    kegiatanMenu.style.height = 'auto'; // Sesuaikan tinggi
                } else {
                    kegiatanMenu.style.display = 'none'; // Sembunyikan dengan slide
                }
            });
        });
    </script>

