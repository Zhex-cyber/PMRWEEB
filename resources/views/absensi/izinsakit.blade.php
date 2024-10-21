@extends('layouts.backend.app')

@section('title')
Daftar Izin/Sakit
@endsection

@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-12 col-md-8">
                <!-- Page pre-title -->
                <h2 class="page-title">
                    Data Izin / Sakit
                </h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <form action="/absensi/izinsakit" method="GET" autocomplete="off">
                    <!-- Form elements -->
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive"> <!-- Tambahkan kelas table-responsive -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nis</th>
                                <th>Nama Anggota</th>
                                <th>Kelas/Jurusan</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Status Approve</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($izinsakit as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d-m-Y',strtotime($d->tgl_izin)) }}</td>
                                <td>{{ $d->nis }}</td>
                                <td>{{ $d->nama_lengkap }}</td>
                                <td>{{ $d->kelas_jurusan }}</td>
                                <td>{{ $d->status == "i" ? "Izin" : "Sakit" }}</td>
                                <td>{{ $d->keterangan }}</td>
                                <td>
                                    @if ($d->status_approved==1)
                                    <span class="badge bg-success">Disetujui</span>
                                    @elseif($d->status_approved==2)
                                    <span class="badge bg-danger">Ditolak</span>
                                    @else
                                    <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($d->status_approved==0)
                                    <a href="#" class="btn btn-sm btn-primary" id="approve" id_izinsakit="{{ $d->id }}">
                                        Approve
                                    </a>
                                    @else
                                    <a href="/absensi/{{ $d->id }}/batalkanizinsakit" class="btn btn-sm bg-danger">
                                        Batalkan
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- Penutup div table-responsive -->
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modal-izinsakit" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- Modal content -->
</div>
@endsection

@push('myscript')
<script>
    $(function() {
        $("#approve").click(function(e) {
            e.preventDefault();
            var id_izinsakit = $(this).attr("id_izinsakit");
            $("#id_izinsakit_form").val(id_izinsakit);
            $("#modal-izinsakit").modal("show");
        });

        $("#dari, #sampai").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        });
    });
</script>
@endpush
