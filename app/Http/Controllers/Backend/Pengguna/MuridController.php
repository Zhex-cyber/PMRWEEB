<?php

namespace App\Http\Controllers\Backend\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\dataMurid;
use App\Models\GoogleForm;
use App\Models\User;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Rules\NisRule;


class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $search = $request->input('search'); // Ambil input dari search

    // Jika input search ada, lakukan pencarian berdasarkan awal nama untuk Guest dan Murid
    if ($search) {
        $murid = User::whereIn('role', ['Guest', 'Anggota'])
            ->where('name', 'LIKE', "{$search}%") // Cari nama yang dimulai dengan input
            ->paginate(4);
    } else {
        // Jika tidak ada input search, tampilkan semua murid
        $murid = User::whereIn('role', ['Guest', 'Anggota'])->paginate(4);
    }

    return view('backend.pengguna.anggota.index', compact('murid'));
}

public function showGoogleForms()
{
    $forms = GoogleForm::all();  // Mengambil semua data Google Forms
    return view('user.show', compact('forms'));  // Mengirimkan data ke view
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pengguna.anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'nis' => ['required', 'unique:users', new NisRule()],
            ],
            [
                'name.required'     => 'Nama tidak boleh kosong.',
                'nis.required'    => 'nis tidak boleh kosong.',
                'nis.unique'      => 'nis sudah pernah digunakan.',
                'nis.nis'       => 'nis yang dimasukan tidak valid.'
            ]
            );

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $errors = $validator->errors();

            if ($request->foto_profile) {
                $image = $request->file('foto_profile');
                $nama_img = time()."_".$image->getClientOriginalName();
                // isi dengan nama folder tempat kemana file diupload
                $tujuan_upload = 'public/images/profile';
                $image->storeAs($tujuan_upload,$nama_img);
            }

            // Pilih kalimat
            $kalimatKe  = "1";
            $username   = implode(" ", array_slice(explode(" ", $request->name), 0, $kalimatKe)); // ambil kalimat

            $murid = new User();
            $murid->name            = $request->name;
            $murid->username        = $username;
            $murid->nis           = $request->nis;
            $murid->role            = 'Guest';
            $murid->foto_profile    = $nama_img ?? '';
            $murid->password        = bcrypt( $request->password);
            $murid->save();

            if ($murid) {
                $detail = new dataMurid();
                $detail->user_id    = $murid->id;
                $detail->save();
            }

            $murid->assignRole($murid->role);

            DB::commit();
            // Session::flash('success', 'Calon Anggota ' . $murid->name . ' berhasil disimpan!');
            return redirect()->route('backend-pengguna-anggota.index')->with('succes' ,'Calon Anggota ' . $murid->name . ' berhasil disimpan!');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $murid = User::whereIn('role',['Guest','Anggota'])->find($id);
        return view('backend.pengguna.anggota.edit', compact('murid'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name'      => 'required|max:255',
               'nis' => ['required', Rule::unique('users')->ignore($id), new NisRule()],
                'status'    => ['required',Rule::in(['Aktif','Tidak Aktif'])],
                'role'      => ['required',Rule::in(['Anggota','Guest'])],
            ],
            [
                'name.required'     => 'Nama tidak boleh kosong.',
                'nis.required'      => 'Nis tidak boleh kosong.',
                'nis.unique' => 'NIS sudah pernah digunakan.',
                'status.required'   => 'Status Murid harus dipilih.',
                'status.in'         => 'Status yang dipilih tidak valid.',
                'role.required'     => 'Role Anggota harus dipilih.',
                'role.in'           => 'Role yang dipilih tidak valid.'
            ]
            );

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $errors = $validator->errors();

            $murid = User::find($id);
            $murid->name            = $request->name;
            $murid->nis             = $request->nis;
            $murid->role            = $request->role;
            $murid->status          = $request->status;
            $murid->update();

            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $murid->assignRole($request->role);

            DB::commit();
            Session::flash('success','Calon Anggota'  . $murid->name .  'Berhasil diupdate menjadi Anggota !');
            return redirect()->route('backend-pengguna-anggota.index');
        } catch (ErrorException $e) {
            DB::rollback();
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $murid= User::findOrfail($id);
        $murid->delete();
        Session::flash('success','Data anggota'   . $murid->name .     'Berhasil dihapus!');
        return redirect()->route('backend-pengguna-anggota.index');
    }




}
