@extends('layouts.app')

@section('content')
    <style>
        /* Root Variables */
        :root {
            --form-bg: #ffffff;
            --form-text: #1e293b;
            --form-label: #64748b;
            --form-input-bg: #f8fafc;
            --form-border: #e2e8f0;
            --form-input-border: #cbd5e1;
        }

        [data-theme="dark"] {
            --form-bg: #1e293b;
            --form-text: #f1f5f9;
            --form-label: #94a3b8;
            --form-input-bg: #0f172a;
            --form-border: #334155;
            --form-input-border: #475569;
        }

        .form-page { 
            padding: 2rem 1rem; 
            background: transparent;
            min-height: 100vh;
            /* Penyesuaian agar tidak terlihat terlalu zoom */
            zoom: 0.9;
        }
        
        .form-container { 
            max-width: 900px; 
            margin: 0 auto; 
            background: var(--form-bg); 
            border-radius: 20px; 
            padding: 2.5rem;
            border: 1px solid var(--form-border);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        /* Header dengan gradient yang lebih soft */
        .form-header {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            border-radius: 16px;
            padding: 1.75rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1.25rem;
            box-shadow: 0 4px 16px rgba(59, 130, 246, 0.25);
        }

        .form-header-icon {
            width: 56px;
            height: 56px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .form-header-text h1 {
            color: white;
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 4px 0;
            letter-spacing: -0.3px;
        }

        .form-header-text p {
            color: rgba(255, 255, 255, 0.95);
            margin: 0;
            font-size: 13px;
            font-weight: 500;
        }

        /* Labels dengan icon */
        .form-label { 
            color: var(--form-text);
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            font-size: 0.875rem;
        }

        .form-label svg {
            width: 16px;
            height: 16px;
            color: #3b82f6;
            flex-shrink: 0;
        }
        
        /* Input & Textarea */
        .form-input, .form-textarea, .form-select-native {
            background: var(--form-input-bg) !important;
            border: 1.5px solid var(--form-input-border) !important;
            color: var(--form-text) !important;
            border-radius: 12px;
            transition: all 0.2s ease;
            font-size: 14px;
            padding: 12px 16px !important;
            width: 100%;
        }

        .form-input:focus, .form-textarea:focus, .form-select-native:focus {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            outline: none;
            background: var(--form-bg) !important;
        }

        .form-input::placeholder, .form-textarea::placeholder {
            color: var(--form-label);
            opacity: 0.6;
        }

        /* Select2 Styling - FIXED */
        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            background-color: var(--form-input-bg) !important;
            border: 1.5px solid var(--form-input-border) !important;
            height: 46px !important;
            border-radius: 12px !important;
            transition: all 0.2s ease;
        }

        .select2-container--default.select2-container--focus .select2-selection--single,
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #3b82f6 !important;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background-color: var(--form-bg) !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: var(--form-text) !important;
            line-height: 43px !important;
            padding-left: 16px !important;
            padding-right: 40px !important;
            font-size: 14px;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: var(--form-label) !important;
            opacity: 0.6;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px !important;
            right: 10px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: var(--form-label) transparent transparent transparent !important;
        }

        /* Dropdown styling */
        .select2-dropdown {
            background-color: var(--form-bg) !important;
            border: 1.5px solid var(--form-border) !important;
            border-radius: 12px !important;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            margin-top: 4px;
        }

        .select2-search--dropdown {
            padding: 12px;
        }

        .select2-search--dropdown .select2-search__field {
            background-color: var(--form-input-bg) !important;
            border: 1.5px solid var(--form-input-border) !important;
            color: var(--form-text) !important;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 14px;
        }

        .select2-search--dropdown .select2-search__field:focus {
            border-color: #3b82f6 !important;
            outline: none;
        }

        .select2-results__options {
            max-height: 300px;
        }

        .select2-results__option { 
            color: var(--form-text) !important; 
            background-color: transparent !important;
            padding: 10px 16px !important;
            transition: all 0.15s;
            font-size: 14px;
        }
        
        .select2-results__option--highlighted[aria-selected] { 
            background-color: rgba(59, 130, 246, 0.1) !important; 
            color: #3b82f6 !important;
        }

        .select2-results__option[aria-selected=true] {
            background-color: rgba(59, 130, 246, 0.15) !important;
            color: #3b82f6 !important;
            font-weight: 600;
        }

        .select2-results__group {
            color: var(--form-label) !important;
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 16px 6px 16px !important;
            background: transparent !important;
        }

        [data-theme="dark"] .select2-results__group {
            color: #94a3b8 !important;
        }

        /* Form group spacing */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row { 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 1.25rem; 
        }
        
        @media (max-width: 768px) { 
            .form-row { 
                grid-template-columns: 1fr; 
            }
            .form-container {
                padding: 1.75rem 1.25rem;
            }
            .form-header {
                flex-direction: column;
                text-align: center;
            }
        }

        /* Buttons */
        .btn-submit { 
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); 
            color: white; 
            padding: 14px 28px; 
            border-radius: 12px; 
            font-weight: 600; 
            border: none; 
            cursor: pointer; 
            transition: all 0.2s ease;
            font-size: 15px;
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
            width: 100%;
        }
        
        .btn-submit:hover { 
            transform: translateY(-1px); 
            box-shadow: 0 6px 16px rgba(249, 115, 22, 0.4);
        }
        
        .btn-cancel { 
            background: var(--form-input-bg); 
            color: var(--form-text); 
            border: 1.5px solid var(--form-border); 
            padding: 14px 28px; 
            border-radius: 12px; 
            text-decoration: none; 
            text-align: center; 
            font-weight: 600;
            transition: all 0.2s ease;
            display: inline-block;
            font-size: 15px;
            width: 100%;
        }

        .btn-cancel:hover {
            background: var(--form-border);
            transform: translateY(-1px);
        }

        /* File input custom */
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            background: var(--form-input-bg);
            border: 1.5px dashed var(--form-input-border);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--form-text);
        }

        .file-input-label:hover {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.05);
        }

        .file-input-label svg {
            width: 20px;
            height: 20px;
            color: #3b82f6;
            flex-shrink: 0;
        }

        .file-name {
            color: var(--form-label);
            font-size: 14px;
            font-weight: 500;
        }

        /* Info badge */
        .info-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 10px;
            background: rgba(59, 130, 246, 0.08);
            border-radius: 8px;
            font-size: 12px;
            color: #3b82f6;
            font-weight: 500;
            margin-top: 6px;
        }

        .info-badge svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }

        [data-theme="dark"] .info-badge {
            background: rgba(96, 165, 250, 0.12);
            color: #60a5fa;
        }

        /* Action buttons container */
        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1.5px solid var(--form-border);
        }

        @media (max-width: 640px) {
            .action-buttons {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="form-page">
        <div class="form-container">
            <div class="form-header">
                <div class="form-header-icon">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <div class="form-header-text">
                    <h1>Buat Laporan Tiket</h1>
                </div>
            </div>

            <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                        Subjek Masalah
                    </label>
                    <input type="text" name="title" class="form-input" placeholder="Jelaskan masalah secara singkat..." required>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Instansi / OPD
                    </label>
                    <select name="instansi" id="instansi_select" class="form-select" required>
                        <option value=""></option>
                        <optgroup label="Pemerintahan">
                            <option value="Inspektorat Kota Binjai">Inspektorat Kota Binjai</option>
                            <option value="Badan Perencanaan Pembangunan Daerah">Badan Perencanaan Pembangunan Daerah</option>
                            <option value="Badan Pengelolaan Keuangan dan Aset Daerah">Badan Pengelolaan Keuangan dan Aset Daerah</option>
                            <option value="Badan Kepegawaian dan Pengembangan SDM">Badan Kepegawaian dan Pengembangan SDM</option>
                            <option value="Badan Pendapatan Daerah">Badan Pendapatan Daerah</option>
                        </optgroup>
                        <optgroup label="Pendidikan & Sosial">
                            <option value="Dinas Pendidikan">Dinas Pendidikan</option>
                            <option value="Dinas Sosial">Dinas Sosial</option>
                            <option value="Dinas Perpustakaan dan Kearsipan">Dinas Perpustakaan dan Kearsipan</option>
                            <option value="Dinas Pemberdayaan Perempuan dan Perlindungan Anak">Dinas Pemberdayaan Perempuan dan Perlindungan Anak</option>
                        </optgroup>
                        <optgroup label="Kesehatan">
                            <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                            <option value="RSUD Kota Binjai">RSUD Kota Binjai</option>
                        </optgroup>
                        <optgroup label="Pembangunan & Infrastruktur">
                            <option value="Dinas Pekerjaan Umum dan Penataan Ruang">Dinas Pekerjaan Umum dan Penataan Ruang</option>
                            <option value="Dinas Perumahan dan Kawasan Permukiman">Dinas Perumahan dan Kawasan Permukiman</option>
                            <option value="Dinas Perhubungan">Dinas Perhubungan</option>
                        </optgroup>
                        <optgroup label="Lingkungan & Pertanian">
                            <option value="Dinas Lingkungan Hidup">Dinas Lingkungan Hidup</option>
                            <option value="Dinas Pertanian dan Pangan">Dinas Pertanian dan Pangan</option>
                        </optgroup>
                        <optgroup label="Ekonomi & Pariwisata">
                            <option value="Dinas Koperasi, UKM, Perindustrian dan Perdagangan">Dinas Koperasi, UKM, Perindustrian dan Perdagangan</option>
                            <option value="Dinas Pariwisata">Dinas Pariwisata</option>
                            <option value="Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</option>
                        </optgroup>
                        <optgroup label="Masyarakat & Kebudayaan">
                            <option value="Dinas Kependudukan dan Pencatatan Sipil">Dinas Kependudukan dan Pencatatan Sipil</option>
                            <option value="Dinas Pemuda dan Olahraga">Dinas Pemuda dan Olahraga</option>
                            <option value="Dinas Kebudayaan">Dinas Kebudayaan</option>
                        </optgroup>
                        <optgroup label="Teknologi & Komunikasi">
                            <option value="Dinas Komunikasi dan Informatika">Dinas Komunikasi dan Informatika</option>
                        </optgroup>
                        <optgroup label="Keamanan & Ketertiban">
                            <option value="Satuan Polisi Pamong Praja">Satuan Polisi Pamong Praja</option>
                            <option value="Badan Penanggulangan Bencana Daerah">Badan Penanggulangan Bencana Daerah</option>
                        </optgroup>
                        <optgroup label="Kecamatan">
                            <option value="Kecamatan Binjai Kota">Kecamatan Binjai Kota</option>
                            <option value="Kecamatan Binjai Utara">Kecamatan Binjai Utara</option>
                            <option value="Kecamatan Binjai Selatan">Kecamatan Binjai Selatan</option>
                            <option value="Kecamatan Binjai Timur">Kecamatan Binjai Timur</option>
                            <option value="Kecamatan Binjai Barat">Kecamatan Binjai Barat</option>
                        </optgroup>
                    </select>
                    <div class="info-badge">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Pilih instansi terkait dengan masalah Anda
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Kategori
                        </label>
                        <select name="category" class="form-input form-select-native" required>
                            <option value="">Pilih kategori...</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Jaringan">Jaringan</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Software">Software</option>
                            <option value="Email">Email</option>
                            <option value="Website">Website</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Foto Bukti (Opsional)
                        </label>
                        <div class="file-input-wrapper">
                            <input type="file" name="image" id="file-input" accept="image/*">
                            <label for="file-input" class="file-input-label">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                <span class="file-name">Pilih file atau drag & drop</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <svg fill="currentColor" viewBox="0 0 24 24" style="width: 16px; height: 16px; color: #25D366;">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                        </svg>
                        Nomor WhatsApp Aktif
                    </label>
                    <div style="display: flex; gap: 8px; align-items: center;">
                        <div style="display: flex; align-items: center; background: var(--form-input-bg); border: 1.5px solid var(--form-input-border); border-radius: 12px; padding: 12px 16px; color: var(--form-text); font-size: 14px; font-weight: 600; min-width: 60px;">
                            +62
                        </div>
                        <input type="text"
                                maxlength="15" 
                               name="whatsapp" 
                               class="form-input" 
                               placeholder="8123456789" 
                               required 
                               style="flex: 1;" 
                               inputmode="numeric"
                               oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/^0+/, '')">
                    </div>
                    <div class="info-badge">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Nomor akan otomatis menggunakan kode negara Indonesia (+62)
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Deskripsi Detail
                    </label>
                    <textarea name="description" rows="6" class="form-textarea" placeholder="Jelaskan masalah secara detail, termasuk kapan terjadi, frekuensi, dan dampaknya..." required></textarea>
                    <div class="info-badge">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                        Semakin detail, semakin cepat kami dapat membantu
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ url()->previous() }}" class="btn-cancel">
                        ← Batal
                    </a>
                    <button type="submit" class="btn-submit">
                        Kirim Laporan →
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize Select2
            $('#instansi_select').select2({
                placeholder: "🔍 Cari instansi...",
                allowClear: true,
                width: '100%'
            });

            // File input display name
            $('#file-input').on('change', function() {
                var fileName = $(this).val().split('\\').pop();
                if(fileName) {
                    $(this).siblings('label').find('.file-name').text('📎 ' + fileName);
                } else {
                    $(this).siblings('label').find('.file-name').text('Pilih file atau drag & drop');
                }
            });

            // Logika Notifikasi Saat Kirim (DIPERBARUI)
            $('form').on('submit', function(e) {
                e.preventDefault();
                let form = this;

                Swal.fire({
                    title: 'Laporan Berhasil Terkirim!',
                    text: 'Terima kasih atas laporannya. Tim kami akan segera meninjau tiket Anda.',
                    icon: 'success',
                    iconColor: '#3b82f6',
                    background: '#ffffff',
                    showConfirmButton: true,
                    confirmButtonText: 'Selesai',
                    confirmButtonColor: '#3b82f6',
                    customClass: {
                        popup: 'rounded-20',
                        title: 'font-bold text-slate-800',
                        confirmButton: 'px-8 py-3 rounded-lg font-semibold'
                    },
                    buttonsStyling: true,
                    showClass: {
                        popup: 'animate__animated animate__fadeInUp animate__faster'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutDown animate__faster'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection