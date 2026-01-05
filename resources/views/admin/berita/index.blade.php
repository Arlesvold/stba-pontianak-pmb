<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Berita Kampus
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- lebar sama dengan marquee: max-w-3xl --}}
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm border border-gray-100 rounded-xl overflow-hidden">
                {{-- header card + tombol tambah --}}
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 tracking-wide uppercase">
                            Daftar Berita
                        </h3>
                        <p class="text-xs text-gray-500">
                            Total: {{ $beritas->total() }} berita.
                        </p>
                    </div>
                    <a href="{{ route('admin.berita.create') }}"
                        class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-xs font-semibold
                              text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2
                              focus:ring-indigo-500 focus:ring-offset-2">
                        + Tambah Berita
                    </a>
                </div>

                {{-- tabel berita --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">
                                    Judul & cuplikan
                                </th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase w-32">
                                    Tanggal
                                </th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase w-40">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($beritas as $berita)
                                <tr class="hover:bg-gray-50/80">
                                    {{-- Judul & cuplikan, rata tengah terhadap header kolom --}}
                                    <td class="px-4 py-3 text-center">
                                        <div class="font-medium text-gray-800">
                                            {{ $berita->judul }}
                                        </div>
                                        <div class="text-[11px] text-gray-500">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi), 80) }}
                                        </div>
                                    </td>

                                    {{-- Tanggal, rata tengah --}}
                                    <td class="px-4 py-3 text-center text-xs text-gray-600 whitespace-nowrap">
                                        {{ $berita->tanggal->format('d M Y') }}
                                    </td>

                                    {{-- Aksi dengan tombol --}}
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.berita.edit', $berita) }}"
                                                class="inline-flex items-center rounded-md border border-indigo-500 px-3 py-1 text-[11px] font-semibold
                                  text-indigo-600 hover:bg-indigo-50">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST"
                                                class="inline"
                                                onsubmit="event.preventDefault(); confirmDeleteData(this, 'Berita', '{{ addslashes($berita->judul) }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-1.5 border border-red-500 text-xs font-medium rounded-full text-red-600 hover:bg-red-50">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-8 text-center text-xs text-gray-500">
                                        Belum ada berita. Klik “Tambah Berita” untuk menambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>

                @if ($beritas->hasPages())
                    <div class="px-6 py-3 border-t border-gray-100">
                        {{ $beritas->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
