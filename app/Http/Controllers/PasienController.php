<?php
namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Untuk transaksi database

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Jika ada keyword pencarian
        if (!empty($search)) {
            // Lakukan pencarian berdasarkan NIS, Nama, atau Kelas
            $pasiens = Pasien::where('nis', 'like', "%{$search}%")
                            ->orWhere('nama_lengkap', 'like', "%{$search}%")
                            ->paginate(4);
        } else {
            // Tampilkan semua data pasien jika tidak ada pencarian
            $pasiens = Pasien::paginate(4);
        }

        return view('pasiens.index', compact('pasiens', 'search'));
    }

    public function create()
    {
        return view('pasiens.create');
    }

    public function store(Request $request)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'nis' => 'required|string|max:255|unique:pasiens,nis',
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:10',
            'jurusan' => 'required|string|max:10',
            'keterangan' => 'required|string',
            'status' => 'required|string|in:Pulang,Balik ke kelas,Puskesmas', // Validasi lebih ketat
        ]);

        DB::transaction(function () use ($validatedData) {
            // Simpan data ke database
            Pasien::create($validatedData);
        });

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function edit(Pasien $pasien)
    {
        return view('pasiens.edit', compact('pasien'));
    }

    public function update(Request $request, Pasien $pasien)
    {
        $validatedData = $request->validate([
            'nis' => 'required|string|max:255|unique:pasiens,nis,' . $pasien->id,
            'nama_lengkap' => 'required|string|max:255',
            'kelas' => 'required|string|max:10',
            'jurusan' => 'required|string|max:10',
            'keterangan' => 'required|string',
            'status' => 'required|string|in:Pulang,Balik ke kelas,Puskesmas', // Validasi status
        ]);

        DB::transaction(function () use ($request, $pasien) {
            // Update data pasien
            $pasien->update($request->all());
        });

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        DB::transaction(function () use ($pasien) {
            // Hapus data pasien
            $pasien->delete();
        });

        return redirect()->route('pasiens.index')->with('success', 'Pasien berhasil dihapus.');
    }

    // Method untuk generate PDF
    public function download($id)
    {
        $pasiens = Pasien::find($id);

        if (!$pasiens->nomor_surat) {
            DB::transaction(function () use ($pasiens) {
                $lastPasien = Pasien::whereNotNull('nomor_surat')->orderBy('id', 'desc')->first();

                if ($lastPasien) {
                    $lastNumber = intval(explode('/', $lastPasien->nomor_surat)[0]);
                    $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
                } else {
                    $newNumber = '001';
                }

                $nomorSurat = $newNumber . '/PMR-KWL/' . Carbon::now()->year;
                $pasiens->nomor_surat = $nomorSurat;
                $pasiens->save();
            });
        }

        $pdf = PDF::loadView('pasiens.data_pasien', compact('pasiens'));
        return $pdf->download('data_pasien_'.$pasiens->nama_lengkap.'.pdf');
    }

    public function downloadPdf()
    {
        // Ambil semua data pasien
        $pasiens = Pasien::all();

        // Load view dan data ke PDF
        $pdf = PDF::loadView('pasiens.pdf', compact('pasiens'));

        // Unduh file PDF
        return $pdf->download('Daftar_Sakit_Sakit_PMR_SMKN1_Kawali.pdf');
    }

}
