<?php

namespace App\Http\Controllers\Backend\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\GoogleForm;
use Illuminate\Http\Request;

class GoogleFormController extends Controller
{
    public function index()
    {
        $forms = GoogleForm::all();
        return view('backend.website.content.google_forms.index', compact('forms'));
    }

    public function create()
    {
        return view('backend.website.content.google_forms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'form_link' => 'required|url',
        ]);

        // Modifikasi link agar bisa di-embed
        $link = str_replace('viewform', 'viewform?embedded=true', $request->form_link);

        // Simpan data ke database
        GoogleForm::create([
            'title' => $request->title,
            'form_link' => $link, // Gunakan link yang sudah dimodifikasi
        ]);

        return redirect()->route('google_forms.index')->with('success', 'Link Google Form berhasil ditambahkan');
    }

    public function show($id)
    {
        $form = GoogleForm::findOrFail($id);
        return view('user.show', compact('form'));
    }
    

    public function edit($id)
    {
        $form = GoogleForm::findOrFail($id);
        return view('backend.website.content.google_forms.edit', compact('form'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'form_link' => 'required|url',
        ]);

        $form = GoogleForm::findOrFail($id);

        // Modifikasi link agar bisa di-embed
        $link = str_replace('viewform', 'viewform?embedded=true', $request->form_link);

        // Update data dengan link yang sudah dimodifikasi
        $form->update([
            'title' => $request->title,
            'link' => $link, // Gunakan link yang sudah dimodifikasi
        ]);

        return redirect()->route('google_forms.index')->with('success', 'Link Google Form berhasil diupdate');
    }

    public function destroy($id)
    {
        $form = GoogleForm::findOrFail($id);
        $form->delete();

        return redirect()->route('google_forms.index')->with('success', 'Link Google Form berhasil dihapus');
    }
}
