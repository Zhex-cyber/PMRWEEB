@extends('layouts.backend.app')
<title>Daftar Ujian</title>
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4 text-center">Daftar Google Forms</h1>
        </div>

        @foreach($forms as $form)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-center">{{ $form->title }}</h2>
                    <iframe src="{{ $form->form_link }}" width="100%" height="400" class="mt-3 rounded" style="border: none;"></iframe>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ $form->form_link }}" target="_blank" class="btn btn-primary mt-2">Isi Form</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
