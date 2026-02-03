<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

                /* Scoped styles hanya untuk elemen di dalam .dashboard-scope */
                .dashboard-scope {
                    font-family: 'Inter', sans-serif;
                    zoom: 0.95;
                }

                :root {
                    --ds-bg-card: #ffffff;
                    --ds-bg-table-header: #f8fafc;
                    --ds-text-main: #1e293b;
                    --ds-text-soft: #64748b;
                    --ds-border: #e2e8f0;
                    --ds-primary: #3b82f6;
                    --ds-shadow: rgba(15, 23, 42, 0.08);
                }

                /* Dark Mode Scoped */
                [data-theme="dark"] .dashboard-scope {
                    --ds-bg-card: #1e293b;
                    --ds-bg-table-header: #0f172a;
                    --ds-text-main: #f1f5f9;
                    --ds-text-soft: #94a3b8;
                    --ds-border: #334155;
                    --ds-primary: #60a5fa;
                    --ds-shadow: rgba(0, 0, 0, 0.3);
                }

                .ds-card {
                    background-color: var(--ds-bg-card);
                    border: 1px solid var(--ds-border);
                    border-radius: 24px;
                    box-shadow: 0 4px 6px -1px var(--ds-shadow);
                }

                .ds-stat-card {
                    padding: 32px;
                    border-radius: 24px;
                    color: white;
                    transition: all 0.3s ease;
                    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
                    position: relative;
                    overflow: hidden;
                    text-decoration: none !important; /* Memastikan link tidak ada garis bawah */
                    display: block;
                }

                .ds-stat-card:hover {
                    transform: translateY(-8px);
                    box-shadow: 0 20px 35px -5px rgba(0, 0, 0, 0.3);
                }

                .ds-stat-card::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: 0;
                    width: 150px;
                    height: 150px;
                    background: rgba(255, 255, 255, 0.1);
                    border-radius: 50%;
                    transform: translate(50%, -50%);
                }

                .ds-stat-card::after {
                    content: '';
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    width: 100px;
                    height: 100px;
                    background: rgba(255, 255, 255, 0.05);
                    border-radius: 50%;
                    transform: translate(-30%, 30%);
                }

                .ds-btn-primary {
                    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
                    color: white;
                    padding: 14px 28px;
                    border-radius: 14px;
                    font-weight: 700;
                    font-size: 15px;
                    transition: all 0.3s;
                    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
                    border: none;
                    cursor: pointer;
                }

                .ds-btn-primary:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
                }

                .ds-badge {
                    padding: 6px 14px;
                    border-radius: 99px;
                    font-size: 11px;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                }

                .stat-icon {
                    position: relative;
                    z-index: 1;
                    width: 56px;
                    height: 56px;
                    background: rgba(255, 255, 255, 0.15);
                    border-radius: 16px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    backdrop-filter: blur(10px);
                    margin-bottom: 16px;
                }

                .live-badge {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    padding: 6px 12px;
                    background: rgba(59, 130, 246, 0.1);
                    border-radius: 99px;
                    font-size: 11px;
                    font-weight: 700;
                    color: #3b82f6;
                    letter-spacing: 0.1em;
                }

                [data-theme="dark"] .live-badge {
                    background: rgba(96, 165, 250, 0.15);
                    color: #60a5fa;
                }

                .live-badge::before {
                    content: '';
                    width: 6px;
                    height: 6px;
                    background: currentColor;
                    border-radius: 50%;
                    animation: pulse 2s ease-in-out infinite;
                }

                @keyframes pulse {
                    0%, 100% { opacity: 1; }
                    50% { opacity: 0.5; }
                }

                /* Main title with consistent colors */
                .main-title {
                    color: var(--ds-text-main);
                }

                .main-title-accent {
                    color: #3b82f6;
                }

                [data-theme="dark"] .main-title-accent {
                    color: #60a5fa;
                }

                .subtitle {
                    color: var(--ds-text-soft);
                }

                /* Search Input Styling */
                .ds-search-input {
                    background: var(--ds-bg-card);
                    border: 1px solid var(--ds-border);
                    border-radius: 12px;
                    padding: 10px 16px 10px 40px;
                    color: var(--ds-text-main);
                    width: 100%;
                    max-width: 300px;
                    transition: all 0.2s;
                }

                .ds-search-input:focus {
                    outline: none;
                    border-color: var(--ds-primary);
                }

                /* Filter Select Styling */
                .ds-filter-select {
                    background: var(--ds-bg-card);
                    border: 1px solid var(--ds-border);
                    border-radius: 12px;
                    padding: 10px 36px 10px 16px;
                    color: var(--ds-text-main);
                    font-size: 14px;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s;
                    appearance: none;
                    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
                    background-repeat: no-repeat;
                    background-position: right 12px center;
                    background-size: 16px;
                }

                .ds-filter-select:focus {
                    outline: none;
                    border-color: var(--ds-primary);
                }

                /* NEW CARD-BASED TABLE STYLES */
                .table-header-modern {
                    display: grid;
                    grid-template-columns: 80px 1.5fr 1fr 200px 200px;
                    gap: 2rem;
                    padding: 1rem 2rem;
                    background: var(--ds-bg-table-header);
                    border-bottom: 1px solid var(--ds-border);
                }

                .table-header-cell {
                    font-size: 0.688rem;
                    font-weight: 800;
                    color: var(--ds-text-soft);
                    text-transform: uppercase;
                    letter-spacing: 0.08em;
                    display: flex;
                    align-items: center;
                }

                .tickets-list-modern {
                    padding: 0;
                    display: flex;
                    flex-direction: column;
                    gap: 0;
                }

                .ticket-card-modern {
                    background: var(--ds-bg-card);
                    border: none;
                    border-bottom: 1px solid var(--ds-border);
                    border-radius: 0;
                    padding: 1.5rem 2rem;
                    display: grid;
                    grid-template-columns: 80px 1.5fr 1fr 200px 200px;
                    gap: 2rem;
                    align-items: center;
                    transition: all 0.2s ease;
                }

                .ticket-card-modern:hover {
                    background: var(--ds-bg-table-header);
                }

                .ticket-card-modern:last-child {
                    border-bottom: none;
                }

                .ticket-number-badge {
                    width: 56px;
                    height: 56px;
                    border-radius: 16px;
                    background: rgba(59, 130, 246, 0.08);
                    border: none;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-weight: 600;
                    color: var(--ds-primary);
                    font-size: 1rem;
                }

                .ticket-info-modern {
                    display: flex;
                    flex-direction: column;
                    gap: 0.5rem;
                    min-width: 0;
                }

                .ticket-id-badge {
                    display: inline-flex;
                    align-items: center;
                    gap: 0.375rem;
                    padding: 0.375rem 0.75rem;
                    background: rgba(59, 130, 246, 0.1);
                    border: none;
                    border-radius: 8px;
                    width: fit-content;
                }

                .ticket-id-hash {
                    font-size: 0.75rem;
                    color: var(--ds-primary);
                    font-weight: 700;
                }

                .ticket-id-code {
                    font-size: 0.875rem;
                    font-weight: 700;
                    color: var(--ds-primary);
                    letter-spacing: -0.01em;
                }

                .ticket-title-modern {
                    font-size: 0.938rem;
                    font-weight: 600;
                    color: var(--ds-text-main);
                    margin-top: 0.25rem;
                    line-height: 1.4;
                }

                .ticket-author-modern {
                    display: flex;
                    align-items: center;
                    gap: 0.375rem;
                    font-size: 0.813rem;
                    color: var(--ds-text-soft);
                    font-weight: 400;
                    margin-top: 0.125rem;
                }

                .ticket-author-modern svg {
                    width: 14px;
                    height: 14px;
                    flex-shrink: 0;
                }

                /* CSS untuk membuat konten di tengah kolom */
                .ticket-time-modern {
                    display: flex;
                    flex-direction: column;
                    align-items: center;    /* Membuat konten rata tengah secara horizontal */
                    justify-content: center; /* Membuat konten rata tengah secara vertikal */
                    text-align: center;
                    gap: 2px;               /* Jarak antara tanggal dan jam */
                    width: 100%;            /* Memastikan mengambil ruang penuh kolom */
                }

                .ticket-date-modern {
                    display: flex;
                    align-items: center;
                    justify-content: center; /* Memastikan icon dan teks tanggal juga center */
                    gap: 6px;
                    font-size: 0.85rem;
                    font-weight: 600;
                    color: var(--ds-text-main);
                }

                .ticket-date-modern svg {
                    width: 16px;
                    height: 16px;
                    flex-shrink: 0;
                }

                .ticket-time-label {
                    font-size: 0.75rem;
                    color: var(--ds-text-soft);
                    /* Hapus padding-left jika sebelumnya ada agar tidak berat sebelah */
                    padding-left: 0; 
                }

                .ticket-status-modern {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .status-badge-modern {
                    display: inline-flex;
                    align-items: center;
                    gap: 0.5rem;
                    padding: 0.5rem 1rem;
                    border-radius: 10px;
                    font-size: 0.75rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                }

                .status-badge-modern.process {
                    background: rgba(59, 130, 246, 0.1);
                    color: #2563eb;
                    border: none;
                }

                .status-badge-modern.waiting {
                    background: rgba(249, 115, 22, 0.1);
                    color: #ea580c;
                    border: none;
                }

                .status-badge-modern.done {
                    background: rgba(16, 185, 129, 0.1);
                    color: #059669;
                    border: none;
                }

                .status-badge-modern::before {
                    content: '';
                    width: 6px;
                    height: 6px;
                    border-radius: 50%;
                    background: currentColor;
                }

                .ticket-actions {
                    display: flex;
                    justify-content: center;
                }

                .action-btn-detail {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    gap: 0.5rem;
                    padding: 0.5rem 1rem;
                    background: rgba(59, 130, 246, 0.1);
                    color: var(--ds-primary);
                    border: none;
                    border-radius: 10px;
                    font-size: 0.875rem;
                    font-weight: 600;
                    transition: all 0.2s ease;
                    cursor: pointer;
                    text-decoration: none;
                    white-space: nowrap;
                }

                .action-btn-detail:hover {
                    background: rgba(59, 130, 246, 0.15);
                    color: var(--ds-primary);
                }

                .action-btn-detail svg {
                    width: 16px;
                    height: 16px;
                    transition: transform 0.2s;
                }

                .action-btn-detail:hover svg {
                    transform: translateX(3px);
                }

                /* Empty state */
                .empty-state-modern {
                    padding: 4rem 2rem;
                    text-align: center;
                }

                .empty-state-icon-modern {
                    width: 80px;
                    height: 80px;
                    margin: 0 auto 1.5rem;
                    border-radius: 50%;
                    background: var(--ds-bg-table-header);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .empty-state-icon-modern svg {
                    width: 40px;
                    height: 40px;
                    color: var(--ds-text-soft);
                }

                .empty-state-modern h3 {
                    font-size: 1.25rem;
                    font-weight: 700;
                    color: var(--ds-text-main);
                    margin-bottom: 0.5rem;
                }

                .empty-state-modern p {
                    font-size: 0.875rem;
                    color: var(--ds-text-soft);
                }

                /* CUSTOM PAGINATION STYLES */
                .pagination-btn {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    width: 40px;
                    height: 40px;
                    border-radius: 10px;
                    transition: all 0.2s ease;
                    border: 1px solid var(--ds-border);
                    background-color: var(--ds-bg-card);
                }

                .pagination-btn-active {
                    color: var(--ds-text-main);
                    cursor: pointer;
                }

                .pagination-btn-active:hover {
                    background-color: var(--ds-primary);
                    color: white;
                    border-color: var(--ds-primary);
                    transform: translateY(-2px);
                    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
                }

                .pagination-btn-disabled {
                    color: var(--ds-text-soft);
                    opacity: 0.4;
                    cursor: not-allowed;
                }

                .pagination-number {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    min-width: 40px;
                    height: 40px;
                    padding: 0 12px;
                    border-radius: 10px;
                    font-weight: 600;
                    font-size: 14px;
                    transition: all 0.2s ease;
                    border: 1px solid var(--ds-border);
                    background-color: var(--ds-bg-card);
                    color: var(--ds-text-main);
                    cursor: pointer;
                }

                .pagination-number:hover {
                    background-color: rgba(59, 130, 246, 0.1);
                    border-color: var(--ds-primary);
                    color: var(--ds-primary);
                }

                .pagination-number-active {
                    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%) !important;
                    color: white !important;
                    border-color: transparent !important;
                    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
                    font-weight: 700;
                }

                [data-theme="dark"] .pagination-number-active {
                    background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%) !important;
                }

                .pagination-dots {
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    width: 40px;
                    height: 40px;
                    color: var(--ds-text-soft);
                    font-weight: 600;
                }

                /* Responsive */
                @media (max-width: 1024px) {
                    .table-header-modern,
                    .ticket-card-modern {
                        grid-template-columns: 1fr;
                        gap: 0.75rem;
                    }

                    .ticket-card-modern {
                        padding: 1.5rem;
                    }

                    .ticket-status-modern {
                        justify-content: flex-start;
                    }

                    .table-header-modern {
                        display: none;
                    }
                }
            </style>

            <div class="dashboard-scope space-y-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div>
                        <h1 class="text-5xl font-black tracking-tight mb-2">
                            <span class="main-title">Halo, </span>
                            <span class="main-title-accent">{{ explode(' ', auth()->user()->name)[0] }}!</span>
                        </h1>
                        <p class="subtitle mt-2 font-medium text-lg">
                            Selamat datang kembali di sistem pelaporan ✨
                        </p>
                    </div>

                    <a href="{{ route('tickets.create') }}" class="ds-btn-primary">
                        <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Buat Laporan Baru
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <a href="{{ request()->fullUrlWithQuery(['status' => '']) }}" class="ds-stat-card bg-gradient-to-br from-purple-500 to-indigo-600">
                        <div class="stat-icon">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <p class="text-sm font-bold uppercase tracking-widest opacity-90 relative z-1">Total Tiket</p>
                        <h2 class="text-6xl font-black mt-3 relative z-1">{{ $tickets->total() }}</h2>
                        <p class="text-xs opacity-75 mt-2 relative z-1">Semua laporan</p>
                    </a>

                    <a href="{{ request()->fullUrlWithQuery(['status' => 'waiting']) }}" class="ds-stat-card bg-gradient-to-br from-orange-400 to-orange-600">
                        <div class="stat-icon">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-sm font-bold uppercase tracking-widest opacity-90 relative z-1">Menunggu</p>
                        <h2 class="text-6xl font-black mt-3 relative z-1">{{ $tickets->where('status', 'waiting')->count() }}</h2>
                        <p class="text-xs opacity-75 mt-2 relative z-1">Belum diproses</p>
                    </a>

                    <a href="{{ request()->fullUrlWithQuery(['status' => 'process']) }}" class="ds-stat-card bg-gradient-to-br from-blue-500 to-blue-700">
                        <div class="stat-icon">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </div>
                        <p class="text-sm font-bold uppercase tracking-widest opacity-90 relative z-1">Sedang Diproses</p>
                        <h2 class="text-6xl font-black mt-3 relative z-1">{{ $tickets->where('status', 'process')->count() }}</h2>
                        <p class="text-xs opacity-75 mt-2 relative z-1">Dalam penanganan</p>
                    </a>

                    <a href="{{ request()->fullUrlWithQuery(['status' => 'done']) }}" class="ds-stat-card bg-gradient-to-br from-emerald-500 to-teal-500">
                        <div class="stat-icon">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-sm font-bold uppercase tracking-widest opacity-90 relative z-1">Tuntas</p>
                        <h2 class="text-6xl font-black mt-3 relative z-1">{{ $tickets->where('status', 'done')->count() }}</h2>
                        <p class="text-xs opacity-75 mt-2 relative z-1">Selesai ditangani</p>
                    </a>
                </div>

                <div class="ds-card overflow-hidden">
                    <div class="px-8 py-6 border-b flex flex-col md:flex-row justify-between items-start md:items-center gap-4" style="border-color: var(--ds-border)">
                        <div>
                            <h2 class="font-black text-2xl main-title">Laporan Terbaru</h2>
                            <p class="text-sm mt-1 subtitle">Data laporan yang masuk ke sistem</p>
                        </div>
                        
                        <div class="flex flex-wrap items-center gap-4 w-full md:w-auto">
                            <form action="{{ request()->url() }}" method="GET" class="flex flex-wrap items-center gap-3 w-full md:w-auto">
                                <div class="relative flex-1 md:flex-none">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 subtitle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                    </span>
                                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari laporan..." class="ds-search-input">
                                </div>
                                
                                <select name="status" onchange="this.form.submit()" class="ds-filter-select">
                                    <option value="">Semua Status</option>
                                    <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>📝 Waiting</option>
                                    <option value="process" {{ request('status') == 'process' ? 'selected' : '' }}>⏱ Process</option>
                                    <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>✓ Done</option>
                                </select>
                            </form>
                            <span class="live-badge hidden lg:inline-flex">LIVE DATA</span>
                        </div>
                    </div>

                    <div class="table-header-modern">
                        <div class="table-header-cell">#</div>
                        <div class="table-header-cell">Info Tiket</div>
                        <div class="table-header-cell" style="justify-content: center;">Waktu</div>
                        <div class="table-header-cell" style="justify-content: center;">Status</div>
                        <div class="table-header-cell" style="justify-content: center;">Aksi</div>
                    </div>

                    <div class="tickets-list-modern">
                        @forelse($tickets as $index => $ticket)
                        <div class="ticket-card-modern">
                            <div class="ticket-number-badge">{{ $tickets->firstItem() + $index }}</div>
                            
                            <div class="ticket-info-modern">
                                <div class="ticket-id-badge">
                                    <span class="ticket-id-hash">#</span>
                                    <span class="ticket-id-code">{{ $ticket->ticket_number }}</span>
                                </div>
                                <div class="ticket-title-modern">{{ $ticket->title }}</div>
                                <div class="ticket-author-modern">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    {{ $ticket->user->name ?? 'safira' }}
                                </div>
                            </div>

                            <div class="ticket-time-modern">
                                <div class="ticket-date-modern">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ $ticket->created_at->format('d M Y') }}
                                </div>
                                <div class="ticket-time-label">{{ $ticket->created_at->format('H:i') }} WIB</div>
                            </div>

                            <div class="ticket-status-modern">
                                <span class="status-badge-modern {{ $ticket->status }}">
                                    @if($ticket->status == 'done')
                                        Done
                                    @elseif($ticket->status == 'process')
                                        Process
                                    @else
                                        Waiting
                                    @endif
                                </span>
                            </div>

                            <div class="ticket-actions">
                                <a href="{{ route('tickets.show', $ticket) }}" class="action-btn-detail">
                                    Lihat Detail
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="empty-state-modern">
                            <div class="empty-state-icon-modern">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 9.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 01-9-9"/>
                                </svg>
                            </div>
                            <h3>Belum ada tiket</h3>
                            <p>Tiket yang Anda buat akan muncul di sini.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                
                <div class="mt-6">
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>