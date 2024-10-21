@extends('layouts.backend.app')
<title>Google Form Link List</title>
@section('content')
    <h1>Daftar Google Form</h1>

    <a href="{{ route('google_forms.create') }}" class="btn btn-success">Tambah Link</a>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($forms as $form)
                <tr>
                    <td>{{ $form->title }}</td>
                    <td><a href="{{ $form->form_link }}" target="_blank">{{ $form->form_link }}</a></td>
                    <td class="d-flex">
                        <a href="{{ route('google_forms.edit', $form->id) }}" class="btn btn-warning" style="height: 39">Edit</a>
                        <form action="{{ route('google_forms.destroy', $form->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button style="margin-left: 5px" type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
