<!-- BEGIN: Vendor JS-->
<script src="{{asset('Assets/backend/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('Assets/backend/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('Assets/backend/js/core/app-menu.js')}}"></script>
<script src="{{asset('Assets/backend/js/core/app.js')}}"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<script src="{{asset('Assets/backend/js/scripts/tables/table-datatables-advanced.js')}}"></script>
<script src="{{asset('Assets/backend/js/scripts/forms/form-select2.js')}}"></script>
<script src="{{asset('Assets/backend/js/scripts/forms/pickers/form-pickers.js')}}"></script>
<script src="{{asset('Assets/backend/js/scripts/components/components-modals.js')}}"></script>
<!-- END: Page JS-->

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</script>

<script>
    $(document).ready(function() {
        // Tambahkan log untuk memastikan script ini berjalan
        console.log('Script siap dijalankan');

        // Tangani klik tombol hapus
        $('.delete-btn').click(function() {
            // Log untuk memastikan tombol terdeteksi
            console.log('Tombol hapus diklik');

            // Ambil tombol dan id dari data-id
            var button = $(this);
            var id = button.data('id');

            // Panggil SweetAlert untuk konfirmasi
            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Menghapus berita ini tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Log untuk memastikan form dikirim
                    console.log('Form akan dikirim');
                    $('#form-delete-' + id).submit();
                } else {
                    console.log('Penghapusan dibatalkan');
                }
            });
        });
    });

</script>
</script>
