<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="PMR WIRA SMKN 1 KAWALI adalah aplikasi manajemen ekstrakurikuler PMR berbasis website yang di bangun dan di kembangkan dengan Framework Laravel">
    <title>Register Page - PMR WIRA SMKN 1 KAWALI</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Assets/backend/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/backend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/backend/css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/backend/css/components.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/backend/css/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/backend/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/backend/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/backend/css/pages/page-auth.css')}}">
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="/">
                            <h2 class="brand-text text-primary ml-1">PMR</h2>
                        </a>
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-6 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                <img class="img-fluid" src="{{asset('Assets/backend/images/illustration/PMRWIRA.png')}}" alt="Login V2" />
                            </div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Register Form-->
                        <div class="d-flex col-lg-6 col-md-8 col-sm-10 col-12 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-10 col-md-8 col-lg-12 mx-auto">
                                @if($message = Session::get('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-body">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        </div>
                                    </div>
                                @endif
                                <h2 class="card-title font-weight-bold mb-1">Welcome to PMR WIRA SMKN 1 KAWALI! 👋</h2>
                                <p class="card-text mb-2">Pendaftaran PMR WIRA SMKN 1 KAWALI</p>
                                <form class="auth-login-form mt-2" action="{{route('register.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}" placeholder="Masukan Nama Lengkap" autofocus />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">NIS</label>
                                        <input class="form-control @error('nis') is-invalid @enderror" type="text" name="nis" value="{{old('nis')}}" placeholder="Masukan NIS" />
                                        @error('nis')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">No WhatApp Calon Anggota</label>
                                        <input class="form-control @error('whatsapp') is-invalid @enderror" type="text" name="whatsapp" value="{{old('whatsapp')}}" placeholder="Masukan No WhatsApp" />
                                        @error('whatsapp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Jurusan</label>
                                        <select class="form-control @error('asal_jurusan') is-invalid @enderror" name="asal_jurusan">
                                            <option value="">Pilih Jurusan</option>
                                            <option value="TKJ 1" {{ old('asal_jurusan') == 'TKJ 1' ? 'selected' : '' }}>TKJ 1</option>
                                            <option value="TKJ 2" {{ old('asal_jurusan') == 'TKJ 2' ? 'selected' : '' }}>TKJ 2</option>
                                            <option value="TKJ 3" {{ old('asal_jurusan') == 'TKJ 3' ? 'selected' : '' }}>TKJ 3</option>
                                            <option value="RPL 1" {{ old('asal_jurusan') == 'RPL 1' ? 'selected' : '' }}>RPL 1</option>
                                            <option value="RPL 2" {{ old('asal_jurusan') == 'RPL 2' ? 'selected' : '' }}>RPL 2</option>
                                            <option value="RPL 3" {{ old('asal_jurusan') == 'RPL 3' ? 'selected' : '' }}>RPL 3</option>
                                            <option value="SK 1" {{ old('asal_jurusan') == 'SK 1' ? 'selected' : '' }}>SK 1</option>
                                            <option value="SK 2" {{ old('asal_jurusan') == 'SK 2' ? 'selected' : '' }}>SK 2</option>
                                            <option value="MP 1" {{ old('asal_jurusan') == 'MP 1' ? 'selected' : '' }}>MP 1</option>
                                            <option value="MP 2" {{ old('asal_jurusan') == 'MP 2' ? 'selected' : '' }}>MP 2</option>
                                            <option value="DPIB 1" {{ old('asal_jurusan') == 'DPIB 1' ? 'selected' : '' }}>DPIB 1</option>
                                            <option value="DPIB 2" {{ old('asal_jurusan') == 'DPIB 2' ? 'selected' : '' }}>DPIB 2</option>
                                            <option value="AK 1" {{ old('asal_jurusan') == 'AK 1' ? 'selected' : '' }}>AK 1</option>
                                            <option value="AK 2" {{ old('asal_jurusan') == 'AK 2' ? 'selected' : '' }}>AK 2</option>
                                            <option value="OTKP 1" {{ old('asal_jurusan') == 'OTKP 1' ? 'selected' : '' }}>OTKP 1</option>
                                            <option value="OTKP 2" {{ old('asal_jurusan') == 'OTKP 2' ? 'selected' : '' }}>OTKP 2</option>
                                            <!-- Add other options similarly -->
                                        </select>
                                        @error('asal_jurusan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="alasan_masuk">Alasan Masuk</label>
                                        <input id="alasan_masuk" type="text" class="form-control" name="alasan_masuk" value="{{ old('alasan_masuk') }}" required>
                                        @error('alasan_masuk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge @error('password') is-invalid @enderror" type="password" name="password" placeholder="············" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirm password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge @error('confirm_password') is-invalid @enderror" type="password" name="confirm_password" placeholder="············" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                            @error('confirm_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">Daftar</button>
                                </form>
                                <p class="text-center mt-2"><span>Sudah Daftar?</span><a href="{{route('login')}}"><span> Login disini</span></a></p>
                            </div>
                        </div>
                        <!-- /Register Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script src="{{asset('Assets/backend/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('Assets/backend/js/core/app-menu.js')}}"></script>
    <script src="{{asset('Assets/backend/js/core/app.js')}}"></script>
    <script src="{{asset('Assets/backend/js/scripts/forms/form-login-register.js')}}"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({ width: 14, height: 14 });
            }
        })
    </script>
</body>
</html>
