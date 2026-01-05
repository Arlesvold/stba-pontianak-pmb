<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Berita Kampus
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm border border-gray-100 rounded-xl p-6">
                <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Isi</label>
                        <textarea name="isi" class="mt-1 block w-full border-gray-300 rounded-md" required>{{ old('isi', $berita->isi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal"
                            value="{{ old('tanggal', $berita->tanggal?->format('Y-m-d')) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Gambar (opsional)</label>
                        @if ($berita->gambar)
                            <p class="text-xs text-gray-500 mb-1">Gambar sekarang: {{ $berita->gambar }}</p>
                        @endif
                        <input type="file" name="gambar" class="mt-1 block w-full text-sm">
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.berita.index') }}" class="text-sm text-gray-600 hover:underline">
                            Batal
                        </a>
                        <x-primary-button>
                            Update
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
