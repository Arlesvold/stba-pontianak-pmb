<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengaturan Marquee Pengumuman
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm border border-gray-100 rounded-xl p-6">
                <form action="{{ route('admin.marquee.update') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Teks Marquee
                        </label>
                        <textarea name="value" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm"
                            required>{{ old('value', $marquee?->value) }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">
                            Tips: PENGUMUMAN 📢 yang jelas dan inti.
                        </p>
                    </div>

                    <div class="flex justify-end">
                        <x-primary-button>
                            Simpan
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
