@extends('layouts.backend.app')

@section('title')
    Dashboard | Admin
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <div class="row">
            <!-- Card Welcome -->
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card card-congratulations" style="background-color: #f9f9f9; border-radius: 15px; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);">
                    <div class="card-body text-center p-5">
                        <img src="{{asset('Assets/backend/images/pages/decore-left.png')}}" class="congratulations-img-left animate__animated animate__fadeInLeft" alt="card-img-left" />
                        <img src="{{asset('Assets/backend/images/pages/decore-right.png')}}" class="congratulations-img-right animate__animated animate__fadeInRight" alt="card-img-right" />
                        <div class="avatar avatar-xxl bg-primary shadow-lg animate__animated animate__bounceIn">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-3 text-white"></i>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <h1 class="mb-2 text-dark font-weight-bolder">Welcome, {{Auth::user()->name}}!</h1>
                            <p class="card-text m-auto w-75 text-dark">Have fun your day :)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Statistik Anggota -->
            <div class="col-lg-12 col-md-12 mt-3">
                <div class="card" style="border-radius: 15px; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);">
                    <div class="card-header">
                        <h4 class="card-title text-dark">Statistik Anggota</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Anggota -->
                                    <tr>
                                        <td>1</td>
                                        <td>Total Anggota</td>
                                        <td>{{$Murid}}</td>
                                    </tr>

                                    <!-- Calon Anggota -->
                                    <tr>
                                        <td>2</td>
                                        <td>Calon Anggota</td>
                                        <td>{{$calonMurid}}</td>
                                    </tr>

                                    <!-- Orang Sakit -->
                                    <tr>
                                        <td>3</td>
                                        <td>Daftar Orang Sakit</td>
                                        <td>{{$pasiens}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .table thead {
        background-color: #f8f9fa;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
    .table td, .table th {
        vertical-align: middle;
    }
    .table-responsive {
        overflow-x: auto;
    }
</style>

@endsection
