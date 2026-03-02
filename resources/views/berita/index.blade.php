@extends('layouts.pmb')

@section('content')
    <style>
        .card-berita {
            transition: transform 0.18s ease, box-shadow 0.18s ease;
        }

        .card-berita:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15) !important;
        }
    </style>

    <div class="container py-5">
        {{-- Header --}}
        <div class="text-center mb-4">
            <h1 class="h4 mb-2">Berita Kampus</h1>
            <p class="text-muted mb-0">
                Kumpulan kegiatan dan informasi terbaru seputar STBA Pontianak.
            </p>
        </div>

        {{-- Wrapper tengah agar kartu tidak terlalu lebar --}}
        <div class="mx-auto" style="max-width: 1000px;">
            @forelse ($beritas as $berita)
                <div class="card card-berita mb-4 border-0 shadow-sm rounded-4 overflow-hidden" style="cursor: pointer;">
                    <div class="row g-0">
                        {{-- Gambar --}}
                        <div class="col-md-5">
                            @if ($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                                    class="img-fluid w-100 h-100" style="object-fit: cover; min-height: 260px;">
                            @else
                                <div class="bg-light w-100 h-100 d-flex align-items-center justify-content-center"
                                    style="min-height: 260px;">
                                    <span class="text-muted small">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>

                        {{-- Konten teks: align ke atas, judul maroon --}}
                        <div class="col-md-7">
                            <div class="card-body px-4 py-4">
                                <div class="text-uppercase text-muted small mb-1">
                                    STBA Pontianak · {{ $berita->tanggal->format('Y') }}
                                </div>
                                <h2 class="h5 mb-2" style="color:#800000;">
                                    <a href="{{ route('berita.show', $berita->id) }}"
                                        class="text-decoration-none text-reset stretched-link">
                                        {{ \Illuminate\Support\Str::limit($berita->judul, 60) }}
                                    </a>
                                </h2>
                                <div class="text-muted small mb-3">
                                    {{ $berita->tanggal->format('d F Y') }}
                                </div>
                                <p class="mb-0">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 120) }}
                                </p>

                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <p class="text-muted text-center">Belum ada berita.</p>
            @endforelse

            @if ($beritas->hasPages())
                <div class="mt-4 d-flex justify-content-center">
                    {{ $beritas->links() }}
                </div>
            @endif


        </div>
    </div>
@endsection
