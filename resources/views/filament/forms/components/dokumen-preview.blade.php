@php
    $record = $getRecord();
    $initialUrl = null;
    $initialExt = null;
    $initialName = null;

    // On edit page, load the saved file for initial preview
    if ($record && $record->file) {
        $initialExt = strtolower(pathinfo($record->file, PATHINFO_EXTENSION));
        $initialUrl = asset('storage/' . $record->file);
        $initialName = basename($record->file);
    }
@endphp

{{-- CDN Libraries for Word/Excel preview --}}
@once
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.8.0/mammoth.browser.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    @endpush
@endonce

<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{
        previewUrl: @js($initialUrl),
        previewExt: @js($initialExt),
        previewName: @js($initialName),
        docxHtml: '',
        xlsxHtml: '',
        loading: false,
        error: '',
        iframeKey: 0,
    
        async renderPreview() {
            this.docxHtml = '';
            this.xlsxHtml = '';
            this.error = '';
    
            if (!this.previewUrl || !this.previewExt) return;
            if (this.previewExt === 'pdf') return;
    
            // DOCX preview via Mammoth.js
            if (this.previewExt === 'docx') {
                this.loading = true;
                try {
                    const response = await fetch(this.previewUrl);
                    const arrayBuffer = await response.arrayBuffer();
                    const result = await mammoth.convertToHtml({ arrayBuffer: arrayBuffer });
                    this.docxHtml = result.value;
                } catch (e) {
                    console.error('DOCX preview error:', e);
                    this.error = 'Gagal memuat preview DOCX: ' + e.message;
                }
                this.loading = false;
                return;
            }
    
            // XLSX / XLS preview via SheetJS
            if (['xlsx', 'xls'].includes(this.previewExt)) {
                this.loading = true;
                try {
                    const response = await fetch(this.previewUrl);
                    const arrayBuffer = await response.arrayBuffer();
                    const workbook = XLSX.read(arrayBuffer, { type: 'array' });
                    const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
                    this.xlsxHtml = XLSX.utils.sheet_to_html(firstSheet, { editable: false });
                } catch (e) {
                    console.error('Excel preview error:', e);
                    this.error = 'Gagal memuat preview Excel: ' + e.message;
                }
                this.loading = false;
                return;
            }
    
            // DOC (legacy) — cannot preview
            if (this.previewExt === 'doc') {
                this.error = 'Format .doc (legacy) tidak mendukung preview. Gunakan format .docx untuk preview.';
            }
        },
    
        init() {
            this.$watch('previewUrl', () => this.renderPreview());
            this.$watch('previewExt', () => this.renderPreview());
            // Initial render for edit page
            this.$nextTick(() => this.renderPreview());
        }
    }"
        @dokumen-preview-updated.window="
            previewUrl = $event.detail.url || null;
            previewExt = $event.detail.ext || null;
            previewName = $event.detail.name || null;
            iframeKey++;
        ">

        {{-- Empty state --}}
        <template x-if="!previewUrl">
            <div class="text-sm text-gray-400 italic p-4 border border-dashed border-gray-600 rounded-lg text-center">
                Upload file di atas untuk melihat preview dokumen.
            </div>
        </template>

        {{-- Loading state --}}
        <template x-if="previewUrl && loading">
            <div class="flex items-center justify-center gap-3 p-8 border border-dashed border-gray-600 rounded-lg">
                <svg class="animate-spin h-5 w-5 text-primary-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                <span class="text-sm text-gray-400">Memuat preview dokumen...</span>
            </div>
        </template>

        {{-- PDF preview --}}
        <template x-if="previewUrl && !loading && previewExt === 'pdf'">
            <div class="mt-2 rounded-xl overflow-hidden border border-gray-700" :key="'pdf-' + iframeKey">
                <iframe :src="previewUrl + '#toolbar=1&navpanes=0'" width="100%" height="650px"
                    style="display:block; background:#fff;"></iframe>
            </div>
        </template>

        {{-- DOCX preview (rendered HTML from Mammoth.js) --}}
        <template x-if="previewUrl && !loading && previewExt === 'docx' && docxHtml">
            <div class="mt-2 rounded-xl overflow-hidden border border-gray-700">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <div class="flex items-center gap-2">
                        <span>📄</span>
                        <span class="text-sm font-medium text-gray-300" x-text="previewName"></span>
                    </div>
                    <a :href="previewUrl" target="_blank" class="text-xs text-primary-400 hover:underline">Unduh
                        File →</a>
                </div>
                <div class="p-6 bg-white max-h-[650px] overflow-y-auto prose prose-sm max-w-none" x-html="docxHtml">
                </div>
            </div>
        </template>

        {{-- Excel preview (rendered HTML table from SheetJS) --}}
        <template x-if="previewUrl && !loading && ['xlsx','xls'].includes(previewExt) && xlsxHtml">
            <div class="mt-2 rounded-xl overflow-hidden border border-gray-700">
                <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <div class="flex items-center gap-2">
                        <span>📊</span>
                        <span class="text-sm font-medium text-gray-300" x-text="previewName"></span>
                    </div>
                    <a :href="previewUrl" target="_blank" class="text-xs text-primary-400 hover:underline">Unduh
                        File →</a>
                </div>
                <div class="bg-white max-h-[650px] overflow-auto" x-html="xlsxHtml"></div>
            </div>
        </template>

        {{-- Error / Unsupported format fallback --}}
        <template x-if="previewUrl && !loading && error">
            <div class="flex items-center gap-4 p-4 border border-dashed border-gray-600 rounded-lg">
                <span class="text-3xl">⚠️</span>
                <div>
                    <p class="text-sm font-semibold text-gray-300" x-text="previewName"></p>
                    <p class="text-xs text-yellow-400 mt-1" x-text="error"></p>
                    <a :href="previewUrl" target="_blank"
                        class="text-xs text-primary-400 underline mt-1 inline-block">
                        Buka / Unduh File →
                    </a>
                </div>
            </div>
        </template>
    </div>
</x-dynamic-component>

{{-- Styling for Excel table --}}
@once
    @push('styles')
        <style>
            /* SheetJS table styling */
            .bg-white table {
                border-collapse: collapse;
                width: 100%;
                font-size: 13px;
            }

            .bg-white table td,
            .bg-white table th {
                border: 1px solid #e5e7eb;
                padding: 6px 10px;
                text-align: left;
                color: #1f2937;
            }

            .bg-white table th,
            .bg-white table tr:first-child td {
                background-color: #f3f4f6;
                font-weight: 600;
            }

            .bg-white table tr:hover td {
                background-color: #f9fafb;
            }
        </style>
    @endpush
@endonce
