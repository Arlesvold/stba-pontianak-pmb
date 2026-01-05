<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard Admin PMB
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola konten PMB STBA Pontianak dari satu tempat.
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Info singkat --}}
            <div class="bg-indigo-50 border border-indigo-100 rounded-xl px-5 py-4 flex items-start gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-600 text-white shadow-sm">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-800 font-medium mb-1">
                        Selamat datang, {{ Auth::user()->name }}.
                    </p>
                    <p class="text-xs text-gray-600">
                        Gunakan menu di bawah ini untuk mengatur marquee pengumuman, berita kampus,
                        dan agenda penting yang tampil di halaman PMB.
                    </p>
                </div>
            </div>

            {{-- Grid kartu menu --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                {{-- Marquee --}}
                <a href="{{ route('admin.marquee.edit') }}"
                    class="group bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md transition
                          flex flex-col p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="h-9 w-9 flex items-center justify-center rounded-full bg-amber-100 text-amber-700">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M3.75 5.25A.75.75 0 0 1 4.5 4.5h15a.75.75 0 0 1 .75.75v3a.75.75 0 0 1-.75.75h-15A.75.75 0 0 1 3.75 8.25v-3zM3 12a.75.75 0 0 1 .75-.75h11.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12zm0 4.5a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 3 16.5z" />
                            </svg>
                        </div>
                        <span
                            class="inline-flex items-center rounded-full bg-amber-50 text-amber-700 px-2 py-0.5
                                   text-[11px] font-medium">
                            Marquee
                        </span>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">
                        Pengaturan Marquee Pengumuman
                    </h3>
                    <p class="text-xs text-gray-600 mb-3">
                        Ubah teks berjalan di halaman utama PMB (pengumuman penting, jadwal, info singkat).
                    </p>
                    <span
                        class="mt-auto inline-flex items-center text-[11px] font-medium text-indigo-600 group-hover:text-indigo-700">
                        Kelola sekarang
                        <svg class="ms-1 h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </a>

                {{-- Berita --}}
                <a href="{{ route('admin.berita.index') }}"
                    class="group bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md transition
                          flex flex-col p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="h-9 w-9 flex items-center justify-center rounded-full bg-blue-100 text-blue-700">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M5.25 4.5A2.25 2.25 0 0 0 3 6.75v10.5A2.25 2.25 0 0 0 5.25 19.5h13.5A2.25 2.25 0 0 0 21 17.25V8.309a2.25 2.25 0 0 0-.659-1.591l-2.559-2.559A2.25 2.25 0 0 0 16.191 3.5H5.25z" />
                            </svg>
                        </div>
                        <span
                            class="inline-flex items-center rounded-full bg-blue-50 text-blue-700 px-2 py-0.5
                                   text-[11px] font-medium">
                            Berita
                        </span>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">
                        Kelola Berita Kampus
                    </h3>
                    <p class="text-xs text-gray-600 mb-3">
                        Tambah, ubah, dan hapus berita yang tampil di halaman PMB dan beranda kampus.
                    </p>
                    <span
                        class="mt-auto inline-flex items-center text-[11px] font-medium text-indigo-600 group-hover:text-indigo-700">
                        Buka daftar berita
                        <svg class="ms-1 h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </a>

                {{-- Agenda --}}
                <a href="{{ route('admin.agenda.index') }}"
                    class="group bg-white border border-gray-100 rounded-xl shadow-sm hover:shadow-md transition
                          flex flex-col p-5">
                    <div class="flex items-center justify-between mb-3">
                        <div
                            class="h-9 w-9 flex items-center justify-center rounded-full bg-emerald-100 text-emerald-700">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M7.5 3.75A.75.75 0 0 0 6.75 3h-.5a2.25 2.25 0 0 0-2.25 2.25v1A.75.75 0 0 0 4.75 7h14.5A.75.75 0 0 0 20 6.25v-1A2.25 2.25 0 0 0 17.75 3h-.5a.75.75 0 0 0-.75.75V4.5H7.5z" />
                                <path d="M20 9H4v8.25A2.25 2.25 0 0 0 6.25 19.5h11.5A2.25 2.25 0 0 0 20 17.25V9z" />
                            </svg>
                        </div>
                        <span
                            class="inline-flex items-center rounded-full bg-emerald-50 text-emerald-700 px-2 py-0.5
                                   text-[11px] font-medium">
                            Agenda
                        </span>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-1">
                        Kelola Agenda Penting
                    </h3>
                    <p class="text-xs text-gray-600 mb-3">
                        Atur jadwal penting seperti pendaftaran, ujian, dan kegiatan kampus lainnya.
                    </p>
                    <span
                        class="mt-auto inline-flex items-center text-[11px] font-medium text-indigo-600 group-hover:text-indigo-700">
                        Buka daftar agenda
                        <svg class="ms-1 h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
