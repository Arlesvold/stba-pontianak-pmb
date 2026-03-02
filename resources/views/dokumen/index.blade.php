@extends('layouts.pmb')

@section('title', 'Dokumen STBA Pontianak')

@section('content')
    <style>
        .card-dokumen {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-dokumen:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .file-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background-color: rgba(128, 0, 0, 0.1);
            color: var(--primary-maroon);
        }
    </style>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold" style="color: var(--primary-maroon);">Dokumen & Unduhan</h1>
            <p class="text-muted">Kumpulan dokumen, formulir, dan file penting lainnya yang dapat diunduh.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @forelse ($dokumens as $dokumen)
                @php
                    $extension = pathinfo($dokumen->file, PATHINFO_EXTENSION);
                    $icon = 'bi-file-earmark-text'; // default

                    if (in_array($extension, ['pdf'])) {
                        $icon = 'bi-file-earmark-pdf';
                    } elseif (in_array($extension, ['doc', 'docx'])) {
                        $icon = 'bi-file-earmark-word';
                    } elseif (in_array($extension, ['xls', 'xlsx'])) {
                        $icon = 'bi-file-earmark-excel';
                    }
                @endphp

                <div class="col-md-6 col-lg-4">
                    <div class="card card-dokumen h-100 border-0 shadow-sm rounded-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start mb-3">
                                <div class="file-icon me-3 flex-shrink-0">
                                    <i class="bi {{ $icon }} fs-2"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1" style="color: var(--primary-maroon);">{{ $dokumen->judul }}
                                    </h5>
                                    <div class="small text-muted mb-2">
                                        Diunggah {{ $dokumen->created_at->format('d M Y') }}
                                    </div>
                                </div>
                            </div>

                            @if ($dokumen->deskripsi)
                                <p class="text-muted small mb-4"
                                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $dokumen->deskripsi }}
                                </p>
                            @else
                                <p class="text-muted small mb-4 fst-italic">Tidak ada deskripsi</p>
                            @endif

                            <div class="mt-auto d-flex gap-2">
                                @if ($extension === 'pdf')
                                    <a href="{{ asset('storage/' . $dokumen->file) }}" target="_blank"
                                        class="btn btn-outline-danger btn-sm w-50 rounded-pill fw-semibold">
                                        <i class="bi bi-eye py-1"></i> Preview
                                    </a>
                                @endif
                                <!-- Always show Download option -->
                                <a href="{{ asset('storage/' . $dokumen->file) }}" download
                                    class="btn btn-danger btn-sm {{ $extension === 'pdf' ? 'w-50' : 'w-100' }} rounded-pill fw-semibold"
                                    style="background-color: var(--primary-maroon); border-color: var(--primary-maroon);">
                                    <i class="bi bi-download py-1"></i> Unduh File
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 py-5 text-center">
                    <div class="text-muted">
                        <i class="bi bi-folder-x display-4 mb-3 d-block"></i>
                        Belum ada dokumen yang tersedia untuk diunduh.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $dokumens->links() }}
        </div>
    </div>
@endsection
