<x-app-layout>
    <style>
        /* Menggunakan variabel warna agar tidak merusak layout asli */
        :root {
            --form-bg: #ffffff;
            --form-text: #1e293b;
            --form-label: #475569;
            --form-input-bg: #f8fafc;
            --form-border: #e2e8f0;
        }

        /* Perbaikan container agar tidak 'pecah' */
        .form-page { padding: 2rem 1rem; background: transparent; }
        .form-container { 
            max-width: 900px; 
            margin: 0 auto; 
            background: var(--form-bg); 
            border-radius: 20px; 
            padding: 2.5rem;
            border: 1px solid var(--form-border);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }

        .form-title { color: var(--form-text); font-weight: 800; }
        .form-label { color: var(--form-label); font-weight: 700; display: flex; align-items: center; gap: 8px; margin-bottom: 8px; font-size: 0.875rem; }
        
        /* Input & Select2 Adaptif */
        .form-input, .form-textarea, .form-input-file {
            background: var(--form-input-bg) !important;
            border: 2px solid var(--form-border) !important;
            color: var(--form-text) !important;
            border-radius: 12px;
        }

        .select2-container--default .select2-selection--single {
            background-color: var(--form-input-bg) !important;
            border: 2px solid var(--form-border) !important;
            height: 50px !important;
            border-radius: 12px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: var(--form-text) !important;
            line-height: 45px !important;
        }

        .select2-dropdown {
            background-color: var(--form-bg) !important;
            border: 2px solid var(--form-border) !important;
            color: var(--form-text) !important;
        }

        .select2-results__option { color: var(--form-text) !important; }
        .select2-results__option--highlighted[aria-selected] { background-color: #3b82f6 !important; }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        @media (max-width: 768px) { .form-row { grid-template-columns: 1fr; } }

        .btn-submit { background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); color: white; padding: 12px; border-radius: 12px; font-weight: 700; border: none; cursor: pointer; }
        .btn-cancel { background: var(--form-input-bg); color: var(--form-label); border: 2px solid var(--form-border); padding: 12px; border-radius: 12px; text-decoration: none; text-align: center; font-weight: 700; }
    </style>

    <div class="form-page">
        <div class="form-container">
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px; border-bottom: 2px solid var(--form-border); padding-bottom: 20px;">
                <div style="width: 60px; height: 60px; background: #3b82f6; border-radius: 15px; display: flex; align-items: center; justify-content: center; color: white;">
                    <svg width="30" height="30" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                </div>
                <div>
                    <h1 class="form-title" style="font-size: 24px; margin: 0;">Buat Laporan Tiket</h1>
                    <p style="color: #64748b; margin: 0;">DISKOMINFO Kota Binjai</p>
                </div>
            </div>

            <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
                @csrf
                <div class="form-group">
                    <label class="form-label">Subjek Masalah</label>
                    <input type="text" name="title" class="form-input" style="width: 100%; padding: 12px;" placeholder="Apa masalahnya?" required>
                </div>

                <div class="form-group" id="select-area">
                    <label class="form-label">Instansi / OPD</label>
                    <select name="instansi" id="instansi_select" class="form-select" required>
                        <option value=""></option>
                        <option value="Inspektur Kota Binjai">Inspektur Kota Binjai</option>
                        <option value="Kepala Dinas Pendidikan Kota Binjai">Kepala Dinas Pendidikan Kota Binjai</option>
                        <option value="Kepala Dinas Kesehatan Kota Binjai">Kepala Dinas Kesehatan Kota Binjai</option>
                        </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Kategori</label>
                        <select name="category" class="form-input" style="width: 100%; padding: 12px;" required>
                            <option value="">Pilih...</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Jaringan">Jaringan</option>
                            <option value="Hardware">Hardware</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Foto Bukti</label>
                        <input type="file" name="image" class="form-input-file" style="width: 100%; padding: 8px;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" rows="5" class="form-textarea" style="width: 100%; padding: 12px;" placeholder="Detail masalah..." required></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 20px; padding-top: 20px; border-top: 2px solid var(--form-border);">
                    <a href="{{ url()->previous() }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">Kirim Laporan</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#instansi_select').select2({
                placeholder: "Cari instansi...",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
</x-app-layout>