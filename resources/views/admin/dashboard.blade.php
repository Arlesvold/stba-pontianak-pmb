@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container py-5">
        <h1 class="h4 mb-3">Dashboard Admin</h1>
        <p class="small text-muted mb-3">
            Selamat datang di panel admin PMB STBA Pontianak.
        </p>
        <ul class="small">
            <li><a href="{{ route('admin.marquee.edit') }}">Pengaturan Marquee Pengumuman</a></li>
            <li><a href="{{ route('admin.berita.index') }}">Kelola Berita Kampus</a></li>
            <li><a href="{{ route('admin.agenda.index') }}">Kelola Agenda Penting</a></li>
        </ul>
    </div>
@endsection
