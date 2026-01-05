<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Berita Kampus
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm border border-gray-100 rounded-xl p-6">
                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" class="mt-1 block w-full border-gray-300 rounded-md"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Isi</label>
                        <textarea name="isi" class="mt-1 block w-full border-gray-300 rounded-md" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <input type="date" name="tanggal" class="mt-1 block w-full border-gray-300 rounded-md"
                            required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Gambar (opsional)</label>
                        <input type="file" name="gambar" class="mt-1 block w-full text-sm">
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.berita.index') }}" class="text-sm text-gray-600 hover:underline">
                            Batal
                        </a>
                        <x-primary-button>
                            Simpan
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
