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

                .ds-table-row {
                    transition: all 0.2s ease;
                }

                .ds-table-row:hover {
                    background-color: rgba(59, 130, 246, 0.05);
                }

                [data-theme="dark"] .ds-table-row:hover {
                    background-color: rgba(96, 165, 250, 0.1);
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

                .action-link {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    padding: 8px 16px;
                    background: rgba(59, 130, 246, 0.1);
                    color: #3b82f6;
                    border-radius: 10px;
                    font-weight: 700;
                    font-size: 13px;
                    transition: all 0.2s;
                }

                [data-theme="dark"] .action-link {
                    background: rgba(96, 165, 250, 0.15);
                    color: #60a5fa;
                }

                .action-link:hover {
                    background: #3b82f6;
                    color: white;
                    transform: translateX(4px);
                }

                [data-theme="dark"] .action-link:hover {
                    background: #60a5fa;
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

                /* Icon backgrounds */
                .icon-box {
                    background: rgba(59, 130, 246, 0.1);
                }

                [data-theme="dark"] .icon-box {
                    background: rgba(96, 165, 250, 0.15);
                }

                .icon-box svg {
                    color: #3b82f6;
                }

                [data-theme="dark"] .icon-box svg {
                    color: #60a5fa;
                }

                /* Ref ID styling */
                .ref-id {
                    color: #3b82f6;
                }

                [data-theme="dark"] .ref-id {
                    color: #60a5fa;
                }

                /* Empty state */
                .empty-state-icon {
                    background: rgba(59, 130, 246, 0.1);
                }

                [data-theme="dark"] .empty-state-icon {
                    background: rgba(96, 165, 250, 0.15);
                }

                /* Table header background */
                .table-header {
                    background-color: var(--ds-bg-table-header);
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

                /* Styling Pagination agar serasi dengan Deep Slate */
                .pagination-modern nav {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    width: 100%;
                }

                .pagination-modern svg {
                    width: 20px;
                    height: 20px;
                    display: inline;
                }

                /* Sembunyikan pagination versi mobile yang sering bikin berantakan */
                .pagination-modern nav > div:first-child {
                    display: none;
                }

                @media (min-width: 640px) {
                    .pagination-modern nav > div:first-child {
                        display: flex;
                    }
                }

                /* Warna Angka Aktif */
                .pagination-modern span[aria-current="page"] span {
                    background-color: var(--ds-primary) !important;
                    color: white !important;
                    border-radius: 8px;
                }

                /* Warna Angka Lainnya */
                .pagination-modern a, .pagination-modern span {
                    border-radius: 8px !important;
                    background-color: var(--ds-bg-card) !important;
                    color: var(--ds-text-main) !important;
                    border: 1px solid var(--ds-border) !important;
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

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="ds-stat-card bg-gradient-to-br from-blue-500 to-blue-600">
                        <div class="stat-icon">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <p class="text-sm font-bold uppercase tracking-widest opacity-90 relative z-1">Total Tiket</p>
                        <h2 class="text-6xl font-black mt-3 relative z-1">{{ $tickets->total() }}</h2>
                        <p class="text-xs opacity-75 mt-2 relative z-1">Semua laporan</p>
                    </div>

                    <div class="ds-stat-card bg-gradient-to-br from-amber-500 to-orange-500">
                        <div class="stat-icon">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-sm font-bold uppercase tracking-widest opacity-90 relative z-1">Sedang Diproses</p>
                        <h2 class="text-6xl font-black mt-3 relative z-1">{{ $tickets->where('status', 'process')->count() }}</h2>
                        <p class="text-xs opacity-75 mt-2 relative z-1">Dalam penanganan</p>
                    </div>

                    <div class="ds-stat-card bg-gradient-to-br from-emerald-500 to-teal-500">
                        <div class="stat-icon">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <p class="text-sm font-bold uppercase tracking-widest opacity-90 relative z-1">Tuntas</p>
                        <h2 class="text-6xl font-black mt-3 relative z-1">{{ $tickets->where('status', 'done')->count() }}</h2>
                        <p class="text-xs opacity-75 mt-2 relative z-1">Selesai ditangani</p>
                    </div>
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
                                
                                {{-- PERUBAHAN: Menambahkan onchange untuk fungsi filter --}}
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

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-xs font-bold uppercase tracking-wider border-b table-header" style="color: var(--ds-text-soft); border-color: var(--ds-border)">
                                    <th class="text-center px-6 py-5 w-16">No</th>
                                    <th class="text-left px-8 py-5">Ref ID</th>
                                    <th class="text-left px-8 py-5">Permasalahan</th>
                                    <th class="text-center px-8 py-5">Status</th>
                                    <th class="text-right px-8 py-5">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="color: var(--ds-text-main)">
                                @forelse($tickets as $index => $ticket)
                                <tr class="border-b last:border-0 ds-table-row" style="border-color: var(--ds-border)">
                                    <td class="px-6 py-5 text-center font-medium subtitle">
                                        {{ $tickets->firstItem() + $index }}
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-xl icon-box flex items-center justify-center">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                </svg>
                                            </div>
                                            <span class="font-black text-base ref-id">
                                                #{{ $ticket->ticket_number }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5">
                                        <div class="font-bold text-base mb-1" style="color: var(--ds-text-main)">{{ $ticket->title }}</div>
                                        <div class="flex items-center gap-2 text-xs subtitle">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $ticket->created_at->format('d M Y, H:i') }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-center">
                                        <span class="ds-badge 
                                            {{ $ticket->status == 'done' ? 'bg-emerald-100 text-emerald-700' : 
                                                ($ticket->status == 'process' ? 'bg-amber-100 text-amber-700' : 
                                                'bg-blue-100 text-blue-700') }}">
                                            {{ $ticket->status == 'done' ? '✓ Selesai' : ($ticket->status == 'process' ? '⏱ Proses' : '📝 waiting') }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <a href="{{ route('tickets.show', $ticket) }}" class="action-link">
                                            Lihat Detail
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-20 text-center">
                                        <div class="flex flex-col items-center gap-4">
                                            <div class="w-20 h-20 rounded-full empty-state-icon flex items-center justify-center">
                                                <svg class="w-10 h-10 subtitle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-bold text-lg main-title">Belum ada laporan</p>
                                                <p class="text-sm mt-1 subtitle">Data tidak ditemukan atau belum ada laporan</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="px-8 py-6 border-t" style="border-color: var(--ds-border)">
                        {{-- PERUBAHAN: Dibungkus dengan class pagination-modern --}}
                        <div class="mt-4 pagination-modern">
                            {{ $tickets->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>