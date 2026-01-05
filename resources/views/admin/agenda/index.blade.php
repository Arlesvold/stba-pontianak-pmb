<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kelola Agenda PMB
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- lebar sama seperti berita/marquee --}}
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-100 shadow-sm rounded-xl overflow-hidden">
                {{-- header card --}}
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-700 tracking-wide uppercase">
                            Daftar Agenda
                        </h3>
                        <p class="text-xs text-gray-500">
                            Total: {{ $agendas->total() }} agenda.
                        </p>
                    </div>
                    <a href="{{ route('admin.agenda.create') }}"
                        class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2 text-xs font-semibold
                              text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2
                              focus:ring-indigo-500 focus:ring-offset-2">
                        + Tambah Agenda
                    </a>
                </div>

                {{-- tabel agenda, mengikuti gaya tabel berita --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">
                                    Judul
                                </th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase w-40">
                                    Tanggal
                                </th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase">
                                    Deskripsi
                                </th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase w-40">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($agendas as $agenda)
                                <tr class="hover:bg-gray-50/80">
                                    {{-- Judul --}}
                                    <td class="px-4 py-3 text-center">
                                        <div class="font-medium text-gray-800">
                                            {{ $agenda->judul }}
                                        </div>
                                    </td>

                                    {{-- Rentang tanggal --}}
                                    <td class="px-4 py-3 text-center text-xs text-gray-600 whitespace-nowrap">
                                        @if ($agenda->tanggal_selesai)
                                            {{ $agenda->tanggal_mulai->format('d M Y') }} -
                                            {{ $agenda->tanggal_selesai->format('d M Y') }}
                                        @else
                                            {{ $agenda->tanggal_mulai->format('d M Y') }}
                                        @endif
                                    </td>

                                    {{-- Deskripsi singkat --}}
                                    <td class="px-4 py-3 text-center text-xs text-gray-600">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($agenda->deskripsi), 80) }}
                                    </td>

                                    {{-- Aksi: tombol sama ukuran dengan berita --}}
                                    <td class="px-4 py-3">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.agenda.edit', $agenda) }}"
                                                class="inline-flex items-center rounded-md border border-indigo-500 px-3 py-1 text-[11px] font-semibold
                                                      text-indigo-600 hover:bg-indigo-50">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.agenda.destroy', $agenda) }}" method="POST"
                                                class="inline"
                                                onsubmit="event.preventDefault(); confirmDeleteData(this, 'Agenda', '{{ addslashes($agenda->judul) }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="...">
                                                    Hapus
                                                </button>
                                            </form>


                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-8 text-center text-xs text-gray-500">
                                        Belum ada agenda. Klik “Tambah Agenda” untuk membuat jadwal baru.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($agendas->hasPages())
                    <div class="px-6 py-3 border-t border-gray-100">
                        {{ $agendas->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
