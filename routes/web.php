<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\Frontend\MenuController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\Pengguna\StafController;
use App\Http\Controllers\Backend\Website\AboutController;
use App\Http\Controllers\Backend\Pengguna\MuridController;
use App\Http\Controllers\Backend\Website\BeritaController;
use App\Http\Controllers\Backend\Website\EventsController;
use App\Http\Controllers\Backend\Website\FooterController;
use App\Http\Controllers\Backend\Website\KegiatanController;
use App\Http\Controllers\Backend\Pengguna\PengajarController;
use App\Http\Controllers\Backend\Pengguna\GoogleFormController;
use App\Http\Controllers\Backend\Website\ImageSliderController;
use App\Http\Controllers\Backend\Website\VisidanMisiController;
use App\Http\Controllers\Backend\Website\ProfilSekolahController;
use App\Http\Controllers\Backend\Website\KategoriBeritaController;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ======= FRONTEND ======= \\

// Menampilkan semua Google Forms (index)
Route::get('/backend/website/content/google_forms', [GoogleFormController::class, 'index'])->name('google_forms.index');

// Form untuk menambah link Google Form baru (create)
Route::get('/backend/website/content/google_forms/create', [GoogleFormController::class, 'create'])->name('google_forms.create');

// Menyimpan link Google Form baru (store)
Route::post('/backend/website/content//google_forms', [GoogleFormController::class, 'store'])->name('google_forms.store');

// Menampilkan detail Google Form (show)
Route::get('/backend/website/content/google_forms/{id}', [GoogleFormController::class, 'show'])->name('google_forms.show');

// Form untuk mengedit Google Form (edit)
Route::get('/backend/website/content/google_forms/{id}/edit', [GoogleFormController::class, 'edit'])->name('google_forms.edit');

// Mengupdate data Google Form (update)
Route::put('/backend/website/content/google_forms/{id}', [GoogleFormController::class, 'update'])->name('google_forms.update');

// Menghapus Google Form (destroy)
Route::delete('/backend/website/content/google_forms/{id}', [GoogleFormController::class, 'destroy'])->name('google_forms.destroy');

Route::get('/user/show', [MuridController::class, 'showGoogleForms'])->name('user.show');

// Route::resource('pasiens', PasienController::class);
Route::get('pasiens/index', [PasienController::class, 'index'])->name('pasiens.index');
Route::get('pasiens/create', [PasienController::class, 'create'])->name('pasiens.create');
Route::post('/pasiens/store', [PasienController::class, 'store'])->name('pasiens.store');
Route::get('pasiens/pdf', [PasienController::class, 'downloadPdf'])->name('Daftar_Sakit_Sakit_PMR_SMKN1_Kawali.pdf');
Route::get('pasiens/download/{id}', [PasienController::class, 'download'])->name('pasiens.download');
Route::get('pasiens', [PasienController::class, 'index'])->name('pasiens.index');




// Route::get('pasiens/pdf', [PasienController::class, 'exportPdf'])->name('pasiens.pdf');
// Route::get('pasiens/print', [PasienController::class, 'print'])->name('pasiens.print');




Route::get('/','Frontend\IndexController@index');

Route::view('/halaman-download-apk', 'download_apk')->name('halaman-download-apk');
Route::get('/download-apk', [DownloadController::class, 'downloadApk'])->name('download-apk');
Route::get('/download-apk/file', [DownloadController::class, 'downloadApk'])->name('download-apk.file');



///// IMAGE SLIDER \\\\\
    Route::delete('imageslider/hapus{id}', [ImageSliderController::class, 'destroy'])->name('image.hapus');
///// BERITA \\\\\
    Route::delete('Berita/hapus/{id}', [BeritaController::class, 'destroy'])->name('berita.hapus');
///// ABOUT \\\\\
    Route::delete('about/hapus/{id}', [AboutController::class, 'destroy'])->name('about.hapus');
/////Kategori\\\\\
    Route::delete('kategoriBerita/hapus{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori.hapus');
/////KEGIATAN\\\\\
    Route::delete('kegiatan/hapus{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.hapus');
    /////KEGIATAN\\\\\
    Route::delete('Murid/hapus{id}', [MuridController::class, 'destroy'])->name('murid.hapus');

    Route::get('/kegiatan/{slug}', [KegiatanController::class, 'show'])->name('detail.kegiatan');

       ////FOTO\\\\

    ///// MENU \\\\\
        //// PROFILE SEKOLAJ \\\\
        Route::get('profile-sekolah',[App\Http\Controllers\Frontend\IndexController::class,'profileSekolah'])->name('profile.sekolah');

        //// VISI dan MISI
        Route::get('visi-dan-misi',[App\Http\Controllers\Frontend\IndexController::class,'visimisi'])->name('visimisi.sekolah');

        //// PROGRAM STUDI \\\\
        Route::get('program/{slug}', [App\Http\Controllers\Frontend\MenuController::class, 'programStudi']);
        //// PROGRAM STUDI \\\\
        Route::get('kegiatan/{slug}', [App\Http\Controllers\Frontend\MenuController::class, 'kegiatan']);

        /// BERITA \\\
        Route::get('berita',[App\Http\Controllers\Frontend\IndexController::class,'berita'])->name('berita');
        Route::get('berita/{slug}',[App\Http\Controllers\Frontend\IndexController::class,'detailBerita'])->name('detail.berita');

        /// EVENT \\\
        Route::get('event/{slug}',[App\Http\Controllers\Frontend\IndexController::class,'detailEvent'])->name('detail.event');
        Route::get('event',[App\Http\Controllers\Frontend\IndexController::class,'events'])->name('event');

Auth::routes(['register' => false]);


// ======= BACKEND ======= \\
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

         /// PROFILE \\\
        Route::resource('profile-settings',Backend\ProfileController::class);
         /// SETTINGS \\\
         Route::prefix('settings')->group( function(){
        // BANK
        Route::get('/',[App\Http\Controllers\Backend\SettingController::class,'index'])->name('settings');
        // TAMBAH BANK
        Route::post('add-bank',[App\Http\Controllers\Backend\SettingController::class,'addBank'])->name('settings.add.bank');
      });
      //Konfigurasi
      Route::get('/konfigurasi/lokasiabsen', [KonfigurasiController::class, 'lokasiabsen'])->name('lokasi.absen');
      Route::post('/konfigurasi/updatelokasiabsen', [KonfigurasiController::class, 'updatelokasiabsen'])->name('updatelokasi.absen');
      //Dashboard
      Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.absen');
      //gethistori
      Route::get('/absensi/histori', [AbsensiController::class, 'histori']);
      Route::post('/gethistori', [AbsensiController::class, 'gethistori']);
      //delete pengajuan izin
      Route::post('/absensi/deleteizin/{id}', [AbsensiController::class, 'deleteIzin'])->name('absensi.delete');
      //Presensi
      Route::post('/getabsensi', [AbsensiController::class, 'getabsensi']);
      Route::post('/tampilkanpeta', [AbsensiController::class, 'tampilkanpeta']);
      Route::post('/absensi/cetakrekap', [AbsensiController::class, 'cetakrekap']);
      Route::post('/absensi/approveizinsakit', [AbsensiController::class, 'approveizinsakit']);
      Route::get('/absensi/{id}/batalkanizinsakit', [AbsensiController::class, 'batalkanizinsakit']);
      Route::get('/absensi/create', [AbsensiController::class, 'create']);
      Route::post('/absensi/store', [AbsensiController::class, 'store']);
      Route::get('/absensi/monitoring', [AbsensiController::class, 'monitoring'])->name('monitoring.absensi');
      Route::get('/absensi/laporan', [AbsensiController::class, 'laporan'])->name('laporan.absensi');
      Route::get('/absensi/rekap', [AbsensiController::class, 'rekap'])->name('rekap.absensi');
      //Izin
      Route::get('/absensi/izinsakit', [AbsensiController::class, 'izinsakit'])->name('data.izin/sakit');
      Route::get('/absensi/buatizin', [AbsensiController::class, 'buatizin'])->name('buat.izin');
      Route::post('/absensi/cekpengajuanizin', [AbsensiController::class, 'cekpengajuanizin'])->name('cek.izin');
      Route::post('/absensi/storeizin', [AbsensiController::class, 'storeizin'])->name('izin.store');
      //CetakLpaporan
      Route::post('/absensi/cetaklaporan', [AbsensiController::class, 'cetaklaporan'])->name('cetak.laporan');


    /// CHANGE PASSWORD
    Route::put('profile-settings/change-password/{id}',[App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.change-password');

    Route::prefix('/')->middleware('role:Admin')->group( function (){
        ///// WEBSITE \\\\\
        Route::resources([
            // /// PROFILE SEKOLAH \\
            // 'backend-profile-sekolah'   => Backend\Website\ProfilSekolahController::class,
            /// VISI & MISI \\\
            'backend-visimisi'  => Backend\Website\VisidanMisiController::class,

            /// KEGIATAN \\\
            'backend-kegiatan' => Backend\Website\KegiatanController::class,
            /// IMAGE SLIDER \\\
            'backend-imageslider' => Backend\Website\ImageSliderController::class,
            /// ABOUT \\\
            'backend-about' => Backend\Website\AboutController::class,

            /// KATEGORI BERITA \\\
            'backend-kategori-berita'   => Backend\Website\KategoriBeritaController::class,
            /// BERITA \\\
            'backend-berita' => Backend\Website\BeritaController::class,
            // /// EVENT \\\
            // 'backend-event' => Backend\Website\EventsController::class,
            /// FOOTER \\\
            'backend-footer'    => Backend\Website\FooterController::class,
        ]);

        ///// PENGGUNA \\\\\
        Route::resources([
            /// PENGAJAR \\\
            'backend-pengguna-pengajar' => Backend\Pengguna\PengajarController::class,
            /// STAF \\\
            'backend-pengguna-staf' => Backend\Pengguna\StafController::class,
            /// MURID \\\
            'backend-pengguna-anggota' => Backend\Pengguna\MuridController::class,
            /// PPDB \\\
            'backend-pengguna-ppdb' => Backend\Pengguna\PPDBController::class,
            /// PERPUSTAKAAN \\\
            'backend-pengguna-perpus' => Backend\Pengguna\PerpusController::class,
            /// BENDAHARA \\\
            'backend-pengguna-bendahara'  => Backend\Pengguna\BendaharaController::class
        ]);
    });
});
