@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h1>Edit Google Form</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('google_forms.update', $form->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $form->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="form_link" class="form-label">Link Google Form</label>
                <input type="url" class="form-control" id="form_link" name="form_link" value="{{ old('form_link', $form->link) }}" required>
                <small class="form-text text-muted">Pastikan link Google Form valid.</small>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('google_forms.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
