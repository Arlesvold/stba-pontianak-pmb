@extends('layouts.pmb')

@section('title', 'Daftar Staf')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/pages/pmb_staf.css') }}">
@endpush

@section('content')
    <div id="staf-page">
        <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h1 class="h4 fw-bold mb-2" style="color: var(--primary-maroon);">
                    Staf & Dosen STBA Pontianak
                </h1>
                <p class="text-muted mb-0 small">
                    Profil singkat staf dan dosen STBA Pontianak.
                </p>
            </div>

            <div class="row g-4">
                @forelse ($stafs as $staf)
                    <div class="col-md-3 col-sm-6">
                        <div class="card card-staf h-100 border-0 shadow-sm rounded-4 text-center" style="cursor: pointer;">
                            @if ($staf->foto)
                                <img src="{{ asset('storage/' . ltrim($staf->foto, '/')) }}" alt="{{ $staf->nama }}"
                                    class="card-img-top rounded-top-4"
                                    style="
                                                        height: 260px;
                                                        width: 100%;
                                                        object-fit: cover;
                                                        object-position: top;
                                                    ">
                            @else
                                <div class="card-img-top rounded-top-4 bg-light d-flex align-items-center justify-content-center"
                                    style="height: 260px;">
                                    <span class="text-muted small">Tidak ada foto</span>
                                </div>
                            @endif


                            <div class="card-body py-3">
                                <h5 class="card-title fw-semibold mb-1" style="font-size: 0.95rem;">
                                    {{ $staf->nama }}
                                </h5>
                                @if ($staf->posisi)
                                    <p class="card-text small text-muted mb-0">
                                        {{ $staf->posisi }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted small mb-0">
                            Belum ada data staf yang ditampilkan.
                        </p>
                    </div>
                @endforelse
            </div>

            @if ($stafs->hasPages())
                <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap gap-2">

                    {{-- Info jumlah data --}}
                    <div class="text-muted small">
                        Showing {{ $stafs->firstItem() }} to {{ $stafs->lastItem() }}
                        of {{ $stafs->total() }} results
                    </div>

                    {{-- Pagination --}}
                    <nav class="custom-pagination">
                        {{ $stafs->links('pagination::simple-bootstrap-5') }}
                    </nav>

                </div>
            @endif
        </div>
    </section>
    </div>
@endsection
