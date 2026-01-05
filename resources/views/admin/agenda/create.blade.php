<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Tambah Agenda Penting
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Buat agenda yang akan tampil di halaman PMB.
                </p>
            </div>
            <a href="{{ route('admin.agenda.index') }}" class="text-xs text-indigo-600 hover:underline">
                Kembali ke daftar agenda
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm border border-gray-100 rounded-xl p-6">
                <form action="{{ route('admin.agenda.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" value="{{ old('judul') }}"
                            class="mt-1 block w-full border-gray-300 rounded-md text-sm" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal mulai</label>
                            <input type="date" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md text-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal selesai (opsional)</label>
                            <input type="date" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}"
                                class="mt-1 block w-full border-gray-300 rounded-md text-sm">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Deskripsi (opsional)</label>
                        <textarea name="deskripsi" rows="3" class="mt-1 block w-full border-gray-300 rounded-md text-sm">{{ old('deskripsi') }}</textarea>
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.agenda.index') }}" class="text-sm text-gray-600 hover:underline">
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
