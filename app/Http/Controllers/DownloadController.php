<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    // Menampilkan halaman download
    public function show()
    {
        return view('download-apk');
    }

    // Fungsi untuk download file APK
    public function downloadApk()  // Ubah dari download() ke downloadApk()
    {
        $filePath = public_path('files/absensi.apk'); // Lokasi file APK di public/files
        $fileName = 'absensi.apk';

        return Response::download($filePath, $fileName, [
            'Content-Type' => 'application/vnd.android.package-archive',
        ]);
    }
}
