<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Http\Requests\KegiatanRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use ErrorException;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('backend.website.kegiatan.index', compact('kegiatan'));
    }

    /**
     * Show the detail of a specific kegiatan.
     *
     * @return \Illuminate\Http\Response
     */
    public function kegiatanDetail()
    {
        $kegiatan = Kegiatan::all();
        return view('frontend.content.kegiatanDetail', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.website.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\KegiatanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KegiatanRequest $request)
    {
        try {
            $nama_img = null;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nama_img = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = 'public/images/kegiatan';
                $image->storeAs($tujuan_upload, $nama_img);
            }

            $url = Str::slug($request->nama);

            $kegiatan = new Kegiatan();
            $kegiatan->nama = $request->nama;
            $kegiatan->slug = $url;
            $kegiatan->image = $nama_img;
            $kegiatan->content = $request->content;
            $kegiatan->save();

            Session::flash('success', 'Kegiatan berhasil ditambahkan!');
            return redirect()->route('backend-kegiatan.index');
        } catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $kegiatan = Kegiatan::where('slug', $slug)->firstOrFail();
        $kegiatanOther = Kegiatan::where('slug', '!=', $slug)->get();

        return view('frontend.content.kegiatanDetail', compact('kegiatan', 'kegiatanOther'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('backend.website.kegiatan.edit', compact('kegiatan'));
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
            $kegiatan = Kegiatan::findOrFail($id);
            $nama_img = $kegiatan->image;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $nama_img = time() . "_" . $image->getClientOriginalName();
                $tujuan_upload = 'public/images/kegiatan';
                $image->storeAs($tujuan_upload, $nama_img);
            }

            $url = Str::slug($request->nama);

            $kegiatan->nama = $request->nama;
            $kegiatan->slug = $url;
            $kegiatan->image = $nama_img;
            $kegiatan->is_active = $request->is_active;
            $kegiatan->content = $request->content;
            $kegiatan->save();

            Session::flash('success', 'Kegiatan berhasil diperbarui!');
            return redirect()->route('backend-kegiatan.index');
        } catch (ErrorException $e) {
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
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        Session::flash('success', 'Kegiatan berhasil dihapus!');
        return redirect()->route('backend-kegiatan.index');
    }
}
