@extends('layouts.backend.app')
@section('title')
    Monitoring Absensi
@endsection

@section('content')
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col-12 col-md-8 col-lg-6">
                <h2 class="page-title">
                    Monitoring Absensi
                </h2>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-icon mb-3">
                                        <span class="input-icon-addon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                                <path d="M16 3l0 4"></path>
                                                <path d="M8 3l0 4"></path>
                                                <path d="M4 11l16 0"></path>
                                                <path d="M8 15h2v2h-2z"></path>
                                            </svg>
                                        </span>
                                        <input type="text" id="tanggal" value="{{ date('Y-m-d') }}" name="tanggal" class="form-control" placeholder="Tanggal Absensi" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive"> <!-- Tambahkan table-responsive -->
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>NIS</th>
                                                    <th>Nama Anggota</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Foto</th>
                                                    <th>Jam Pulang</th>
                                                    <th>Foto</th>
                                                    <th>Keterangan</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="loadabsensi">
                                                <tr>
                                                    <td colspan="9" class="text-center">Memuat data...</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- Penutup div table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-tampilkanpeta" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lokasi Absensi Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="loadmap"></div>
            </div>
        </div>
    </div>
@endsection

@push('myscript')
<script>
    $(function() {
        // Inisialisasi Datepicker
        $("#tanggal").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        });

        function loadabsensi() {
            var tanggal = $("#tanggal").val();
            if (!tanggal) {
                alert("Tanggal harus dipilih.");
                return;
            }
            $("#loadabsensi").html('<tr><td colspan="9" class="text-center">Memuat data...</td></tr>');
            $.ajax({
                type: 'POST',
                url: '/getabsensi',
                data: {
                    _token: "{{ csrf_token() }}",
                    tanggal: tanggal
                },
                cache: false,
                success: function(respond) {
                    $("#loadabsensi").html(respond);
                }
            });
        }

        // Memuat data saat tanggal diubah
        $("#tanggal").change(function() {
            loadabsensi();
        });

        // Memuat data saat halaman dibuka
        loadabsensi();
    });
</script>
@endpush
