@extends('layouts.backend.app')

@section('title')
    Kegiatan
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
                    <h2> Kegiatan</h2>
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
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Kegiatan  <a href=" {{route('backend-kegiatan.create')}} " class="btn btn-success">Tambah</a></h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>URL</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($kegiatan as $key => $kegiatans)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$kegiatans->nama}} </td>
                                                    <td> {{$kegiatans->slug}} </td>
                                                    <td> {{$kegiatans->is_active == '0' ? 'Aktif' : 'Tidak Aktif'}} </td>
                                                    <td class="d-flex">
                                                        <a href=" {{route('backend-kegiatan.edit', $kegiatans->id)}} " class="btn btn-warning btn-sm">Edit</a>
                                                        <form id="form-delete-{{ $kegiatans->id }}" action="{{ route('kegiatan.hapus', $kegiatans->id) }}" method="POST" style="margin-left: 5px;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $kegiatans->id }}">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                           @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
