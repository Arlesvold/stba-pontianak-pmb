<?php

$file = __DIR__ . '/../resources/views/pmb/unggah-dokumen.blade.php';
$content = file_get_contents($file);

$card1 = <<<HTML
                {{-- Upload KK --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="card-title fw-bold text-dark mb-0">
                            <i class="bi bi-file-earmark-person me-2" style="color: var(--primary-maroon);"></i>
                            Kartu Keluarga (KK)
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <p class="small text-muted mb-3">
                            Upload Kartu Keluarga. Format JPG, PNG, atau PDF, maks. 4 MB.
                        </p>

                        @if (optional(\$registration)->kk_path)
                            <div class="mb-3">
                                <div class="bg-light p-3 rounded-3 border d-flex align-items-center">
                                    <i class="bi bi-file-earmark-check-fill text-success fs-3 me-3"></i>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="small fw-bold text-dark">File Tersimpan</div>
                                        <div class="small text-muted text-truncate">
                                            <a href="{{ Storage::url(\$registration->kk_path) }}" target="_blank"
                                                class="text-decoration-none">
                                                Lihat Dokumen
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge bg-success mb-auto">Terupload</span>
                                </div>
                                <div class="form-text mt-2"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin mengganti file.</div>
                            </div>
                        @endif

                        <input type="file" name="kk" id="kk_input"
                            class="form-control @error('kk') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">

                        <div id="kk_preview_container" class="mt-3 d-none">
                            <div class="card border p-2">
                                <div class="d-flex align-items-center">
                                    <div id="kk_preview_icon" class="me-3 fs-1 text-danger"></div>
                                    <div class="overflow-hidden">
                                        <h6 class="mb-0 text-truncate" id="kk_filename">Filename.jpg</h6>
                                        <small class="text-muted" id="kk_filesize">0 KB</small>
                                    </div>
                                </div>
                                <img id="kk_preview_img" src="" class="img-fluid mt-2 rounded d-none"
                                    style="max-height: 200px; width: auto;">
                            </div>
                        </div>

                        @error('kk')
                            <div class="invalid-feedback">{{ \$message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Upload Transkrip Nilai --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <h5 class="card-title fw-bold text-dark mb-0">
                            <i class="bi bi-file-earmark-bar-graph me-2" style="color: var(--primary-maroon);"></i>
                            Transkrip Nilai
                        </h5>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <p class="small text-muted mb-3">
                            Upload Transkrip Nilai terakhir. Format JPG, PNG, atau PDF, maks. 4 MB.
                        </p>

                        @if (optional(\$registration)->transkrip_path)
                            <div class="mb-3">
                                <div class="bg-light p-3 rounded-3 border d-flex align-items-center">
                                    <i class="bi bi-file-earmark-check-fill text-success fs-3 me-3"></i>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="small fw-bold text-dark">File Tersimpan</div>
                                        <div class="small text-muted text-truncate">
                                            <a href="{{ Storage::url(\$registration->transkrip_path) }}" target="_blank"
                                                class="text-decoration-none">
                                                Lihat Dokumen
                                            </a>
                                        </div>
                                    </div>
                                    <span class="badge bg-success mb-auto">Terupload</span>
                                </div>
                                <div class="form-text mt-2"><i class="bi bi-info-circle me-1"></i>Upload ulang jika ingin mengganti file.</div>
                            </div>
                        @endif

                        <input type="file" name="transkrip_nilai" id="transkrip_input"
                            class="form-control @error('transkrip_nilai') is-invalid @enderror" accept=".jpg,.jpeg,.png,.pdf">

                        <div id="transkrip_preview_container" class="mt-3 d-none">
                            <div class="card border p-2">
                                <div class="d-flex align-items-center">
                                    <div id="transkrip_preview_icon" class="me-3 fs-1 text-danger"></div>
                                    <div class="overflow-hidden">
                                        <h6 class="mb-0 text-truncate" id="transkrip_filename">Filename.jpg</h6>
                                        <small class="text-muted" id="transkrip_filesize">0 KB</small>
                                    </div>
                                </div>
                                <img id="transkrip_preview_img" src="" class="img-fluid mt-2 rounded d-none"
                                    style="max-height: 200px; width: auto;">
                            </div>
                        </div>

                        @error('transkrip_nilai')
                            <div class="invalid-feedback">{{ \$message }}</div>
                        @enderror
                    </div>
                </div>

HTML;

// 1. Insert new cards before "Upload pas foto"
$target1 = "                {{-- Upload pas foto --}}";
$content = str_replace($target1, $card1 . $target1, $content);

// 2. Insert Status Berkas
$status_berkas = <<<HTML
                    <div class="d-flex align-items-center mb-2">
                        @if (\$registration->kk_path)
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span class="small fw-bold text-success">Kartu Keluarga: Sudah diupload</span>
                        @else
                            <i class="bi bi-hourglass-split text-warning me-2"></i>
                            <span class="small text-muted">Kartu Keluarga: Menunggu upload</span>
                        @endif
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        @if (\$registration->transkrip_path)
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span class="small fw-bold text-success">Transkrip Nilai: Sudah diupload</span>
                        @else
                            <i class="bi bi-hourglass-split text-warning me-2"></i>
                            <span class="small text-muted">Transkrip Nilai: Menunggu upload</span>
                        @endif
                    </div>
HTML;
$target2 = "                    <div class=\"d-flex align-items-center\">
                        @if (\$registration->foto_path)";
$content = str_replace($target2, $status_berkas . "\n" . $target2, $content);

// 3. Insert JS logic
$js_logic = <<<HTML
                            // Preview KK
                            const kkInput = document.getElementById('kk_input');
                            if (kkInput) {
                                kkInput.addEventListener('change', function(e) {
                                    handleDocumentPreview(e, 'kk');
                                });
                            }

                            // Preview Transkrip
                            const transkripInput = document.getElementById('transkrip_input');
                            if (transkripInput) {
                                transkripInput.addEventListener('change', function(e) {
                                    handleDocumentPreview(e, 'transkrip');
                                });
                            }

                            function handleDocumentPreview(e, prefix) {
                                const file = e.target.files[0];
                                const container = document.getElementById(prefix + '_preview_container');
                                const filename = document.getElementById(prefix + '_filename');
                                const filesize = document.getElementById(prefix + '_filesize');
                                const img = document.getElementById(prefix + '_preview_img');
                                const icon = document.getElementById(prefix + '_preview_icon');

                                if (file) {
                                    container.classList.remove('d-none');
                                    filename.textContent = file.name;
                                    filesize.textContent = (file.size / 1024).toFixed(2) + ' KB';

                                    if (file.type === 'application/pdf') {
                                        icon.innerHTML = '<i class="bi bi-file-earmark-pdf-fill"></i>';
                                        img.classList.add('d-none');
                                    } else if (file.type.startsWith('image/')) {
                                        icon.innerHTML = '<i class="bi bi-file-earmark-image-fill text-primary"></i>';
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            img.src = e.target.result;
                                            img.classList.remove('d-none');
                                        }
                                        reader.readAsDataURL(file);
                                    } else {
                                        icon.innerHTML = '<i class="bi bi-file-earmark-fill text-secondary"></i>';
                                        img.classList.add('d-none');
                                    }
                                } else {
                                    container.classList.add('d-none');
                                }
                            }
HTML;
$target3 = "                        });
                    </script>";
$content = str_replace($target3, $js_logic . "\n" . $target3, $content);

file_put_contents($file, $content);
echo "Successfully updated blade view.\n";
