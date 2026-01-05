@extends('layouts.pmb')

@section('title', 'Agenda')

@section('content')
    <section class="py-4">
        <div class="container">
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="h5 fw-bold mb-1" style="color: var(--primary-maroon);">
                        Agenda Penting PMB
                    </h2>
                    <p class="small text-muted mb-0">
                        Jadwal utama pelaksanaan Penerimaan Mahasiswa Baru STBA Pontianak.
                    </p>
                </div>
            </div>

            {{-- Card utama agenda --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    @forelse ($agendas as $agenda)
                        <div class="row align-items-start @if (!$loop->last) mb-3 pb-3 border-bottom @endif">
                            {{-- Kolom tanggal --}}
                            <div class="col-md-2 col-3 text-center">
                                @php
                                    $mulai = \Carbon\Carbon::parse($agenda->tanggal_mulai);
                                    $selesai = $agenda->tanggal_selesai
                                        ? \Carbon\Carbon::parse($agenda->tanggal_selesai)
                                        : null;
                                @endphp

                                <div class="badge bg-light text-muted small mb-1">
                                    @if ($selesai && $selesai->ne($mulai))
                                        {{ $mulai->format('j M') }} – {{ $selesai->format('j M') }}
                                    @else
                                        {{ $mulai->format('j M') }}
                                    @endif
                                </div>
                                <div class="small text-muted">
                                    {{ $mulai->format('Y') }}
                                </div>
                            </div>

                            {{-- Icon bulat --}}
                            <div class="col-md-1 d-none d-md-flex justify-content-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:34px;height:34px;background:var(--primary-maroon);color:#fff;">
                                    <i class="bi bi-calendar-event"></i>
                                </div>
                            </div>

                            {{-- Judul & deskripsi --}}
                            <div class="col-md-9 col-9">
                                <div class="fw-semibold mb-1" style="color:#212529;">
                                    {{ $agenda->judul }}
                                </div>
                                <div class="small text-muted">
                                    {{ $agenda->deskripsi ?: 'Agenda penting terkait pelaksanaan PMB STBA Pontianak.' }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="small text-muted mb-0">
                            Belum ada agenda PMB yang terjadwal.
                        </p>
                    @endforelse
                </div>
            </div>

            {{-- Catatan --}}
            <div class="mt-3 small text-muted">
                Pastikan Anda mencatat jadwal di atas dan secara berkala memeriksa email serta halaman ini
                untuk pembaruan informasi.
            </div>
        </div>
    </section>
@endsection
