<x-app-layout>
    <style>
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .animate-slide-up {
            animation: slide-up 0.6s ease-out forwards;
        }
        
        .gradient-animated {
            background-size: 200% 200%;
            animation: gradient-shift 8s ease infinite;
        }
        
        .stat-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .stat-card:hover {
            transform: translateY(-8px);
        }
        
        .wave-pattern {
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(249, 115, 22, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(30, 58, 138, 0.08) 0%, transparent 50%);
        }
        
        .signal-icon {
            position: relative;
        }
        
        .signal-icon::before,
        .signal-icon::after {
            content: '';
            position: absolute;
            border: 2px solid currentColor;
            border-radius: 50%;
            animation: pulse-slow 2s infinite;
        }
        
        .signal-icon::before {
            width: 30px;
            height: 30px;
            top: -5px;
            left: -5px;
            animation-delay: 0s;
        }
        
        .signal-icon::after {
            width: 45px;
            height: 45px;
            top: -12.5px;
            left: -12.5px;
            animation-delay: 1s;
        }
    </style>

    <div class="py-12 bg-gradient-to-br from-slate-50 via-blue-50 to-orange-50 min-h-screen wave-pattern">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12 animate-slide-up">
                <div class="flex items-start gap-6">
                    <!-- Logo Section -->
                    <div class="hidden md:block">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-900 to-blue-700 rounded-3xl flex items-center justify-center shadow-xl relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-br from-orange-500 to-orange-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            <svg class="w-10 h-10 text-white relative z-10" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M1 9l2 2c4.97-4.97 13.03-4.97 18 0l2-2C16.93 2.93 7.08 2.93 1 9zm8 8l3 3 3-3c-1.65-1.66-4.34-1.66-6 0zm-4-4l2 2c2.76-2.76 7.24-2.76 10 0l2-2C15.14 9.14 8.87 9.14 5 13z"/>
                            </svg>
                            <div class="signal-icon absolute inset-0"></div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="px-4 py-1.5 bg-gradient-to-r from-blue-900 to-blue-700 text-white text-[10px] font-black uppercase tracking-[0.2em] rounded-full shadow-lg">
                                DISKOMINFO
                            </span>
                            <div class="h-1 w-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-full"></div>
                        </div>
                        <h1 class="text-5xl md:text-6xl font-black bg-gradient-to-r from-blue-900 via-blue-700 to-orange-600 bg-clip-text text-transparent tracking-tighter leading-tight mb-2">
                            Dashboard Admin
                        </h1>
                        <p class="text-slate-600 font-semibold tracking-wide flex items-center gap-2">
                            <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            Kota Binjai - Sistem Pelaporan Terintegrasi
                        </p>
                    </div>
                </div>
                
                <div class="flex gap-3">
                    <button class="px-6 py-3.5 bg-white border-2 border-blue-900 text-blue-900 rounded-2xl font-bold text-xs uppercase tracking-widest hover:bg-blue-900 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Export Data
                    </button>
                    <button class="px-6 py-3.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-2xl font-bold text-xs uppercase tracking-widest hover:shadow-2xl hover:from-orange-600 hover:to-orange-700 transition-all duration-300 shadow-lg flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Buat Laporan
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Total Masuk Card -->
                <div class="stat-card bg-white p-8 rounded-3xl border-2 border-blue-100 shadow-xl hover:shadow-2xl hover:border-blue-200 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-100 to-transparent rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <p class="text-[10px] font-black text-blue-900 uppercase tracking-[0.15em]">Total Masuk</p>
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-6xl font-black text-blue-900 leading-none">{{ $stats['total'] }}</h3>
                            <span class="text-sm font-bold text-blue-600">Tiket</span>
                        </div>
                        <div class="mt-4 h-2 bg-blue-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-blue-900 to-blue-600 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                </div>

                <!-- Menunggu Card -->
                <div class="stat-card bg-gradient-to-br from-orange-500 to-orange-600 gradient-animated p-8 rounded-3xl shadow-2xl hover:shadow-orange-500/50 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <p class="text-[10px] font-black text-orange-100 uppercase tracking-[0.15em]">Menunggu</p>
                            <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2 text-white">
                            <h3 class="text-6xl font-black leading-none">{{ $stats['waiting'] }}</h3>
                            <span class="text-sm font-bold opacity-90">Urgent</span>
                        </div>
                        <div class="mt-4 flex items-center gap-2 text-white/90">
                            <svg class="w-4 h-4 animate-bounce" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-xs font-bold uppercase tracking-wider">Perlu Perhatian</span>
                        </div>
                    </div>
                </div>

                <!-- Resolved Card -->
                <div class="stat-card bg-white p-8 rounded-3xl border-2 border-emerald-100 shadow-xl hover:shadow-2xl hover:border-emerald-200 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-100 to-transparent rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <p class="text-[10px] font-black text-emerald-900 uppercase tracking-[0.15em]">Resolved</p>
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-6xl font-black text-emerald-600 leading-none">{{ $stats['done'] }}</h3>
                            <span class="text-sm font-bold text-emerald-700">Selesai</span>
                        </div>
                        <div class="mt-4 h-2 bg-emerald-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full transition-all duration-1000" style="width: {{ $stats['total'] > 0 ? ($stats['done'] / $stats['total'] * 100) : 0 }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- User Aktif Card -->
                <div class="stat-card bg-gradient-to-br from-blue-900 to-blue-700 p-8 rounded-3xl shadow-2xl hover:shadow-blue-900/50 relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-br from-orange-500/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <p class="text-[10px] font-black text-blue-100 uppercase tracking-[0.15em]">User Aktif</p>
                            <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2 text-white">
                            <h3 class="text-6xl font-black leading-none">{{ \App\Models\User::count() }}</h3>
                            <span class="text-sm font-bold opacity-90">OPD</span>
                        </div>
                        <div class="mt-4 flex items-center gap-2 text-white/80">
                            <div class="flex -space-x-2">
                                <div class="w-6 h-6 rounded-full bg-orange-500 border-2 border-blue-900"></div>
                                <div class="w-6 h-6 rounded-full bg-white border-2 border-blue-900"></div>
                                <div class="w-6 h-6 rounded-full bg-orange-400 border-2 border-blue-900"></div>
                            </div>
                            <span class="text-xs font-bold uppercase tracking-wider">Instansi Terdaftar</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="bg-white rounded-[2.5rem] border-2 border-blue-100 shadow-2xl overflow-hidden animate-slide-up">
                <!-- Table Header -->
                <div class="px-10 py-8 bg-gradient-to-r from-blue-900 to-blue-700 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-orange-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-black text-white text-xl tracking-tight">Laporan Masuk Real-Time</h3>
                            <p class="text-blue-200 text-xs font-semibold mt-1">Update otomatis setiap detik</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.tickets.index') }}" class="group px-6 py-3 bg-white/10 backdrop-blur-sm hover:bg-white text-white hover:text-blue-900 rounded-2xl font-bold text-xs uppercase tracking-widest transition-all duration-300 flex items-center gap-2 border-2 border-white/20 hover:border-white">
                        Lihat Semua
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-gradient-to-r from-slate-50 to-blue-50">
                                <th class="px-10 py-5 text-[10px] font-black text-blue-900 uppercase tracking-[0.15em]">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                        </svg>
                                        OPD / Instansi
                                    </div>
                                </th>
                                <th class="px-10 py-5 text-[10px] font-black text-blue-900 uppercase tracking-[0.15em]">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                        </svg>
                                        Judul Kendala
                                    </div>
                                </th>
                                <th class="px-10 py-5 text-[10px] font-black text-blue-900 uppercase tracking-[0.15em]">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                        Waktu Lapor
                                    </div>
                                </th>
                                <th class="px-10 py-5 text-[10px] font-black text-blue-900 uppercase tracking-[0.15em] text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"/>
                                        </svg>
                                        Status
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($tickets as $ticket)
                            <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-orange-50 transition-all duration-300 group">
                                <td class="px-10 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-50 rounded-2xl flex items-center justify-center font-black text-blue-900 text-sm group-hover:scale-110 transition-transform">
                                            {{ substr($ticket->user->name ?? 'OPD', 0, 2) }}
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-black text-blue-900 tracking-tight leading-none mb-1.5 group-hover:text-orange-600 transition-colors">
                                                {{ $ticket->user->name ?? 'OPD Umum' }}
                                            </span>
                                            <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 bg-orange-500 rounded-full"></span>
                                                ID: #{{ $ticket->ticket_number }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-10 py-6">
                                    <span class="font-bold text-slate-700 group-hover:text-blue-900 transition-colors line-clamp-2">
                                        {{ $ticket->title }}
                                    </span>
                                </td>
                                <td class="px-10 py-6">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-orange-500 rounded-full animate-pulse"></div>
                                        <span class="text-xs font-bold text-slate-500">
                                            {{ $ticket->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-10 py-6 text-right">
                                    @php
                                        $statusConfig = [
                                            'pending' => ['bg' => 'bg-orange-500', 'text' => 'text-white', 'label' => 'Menunggu'],
                                            'waiting' => ['bg' => 'bg-orange-500', 'text' => 'text-white', 'label' => 'Menunggu'],
                                            'process' => ['bg' => 'bg-blue-500', 'text' => 'text-white', 'label' => 'Proses'],
                                            'done' => ['bg' => 'bg-emerald-500', 'text' => 'text-white', 'label' => 'Selesai'],
                                        ];
                                        $config = $statusConfig[$ticket->status] ?? ['bg' => 'bg-slate-500', 'text' => 'text-white', 'label' => ucfirst($ticket->status)];
                                    @endphp
                                    <span class="inline-flex items-center gap-2 px-5 py-2.5 {{ $config['bg'] }} {{ $config['text'] }} rounded-2xl text-[9px] font-black uppercase tracking-widest shadow-lg group-hover:scale-105 transition-transform">
                                        <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                        {{ $config['label'] }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-20 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="w-24 h-24 bg-gradient-to-br from-slate-100 to-slate-50 rounded-full flex items-center justify-center">
                                            <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-slate-400 font-black uppercase tracking-widest text-sm mb-1">Belum Ada Aktivitas</p>
                                            <p class="text-slate-300 text-xs">Data akan muncul setelah ada laporan masuk</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($tickets->count() > 0)
                <!-- Table Footer dengan Informasi -->
                <div class="px-10 py-6 bg-gradient-to-r from-slate-50 to-blue-50 border-t-2 border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-6 text-xs">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-orange-500"></div>
                            <span class="font-bold text-slate-600">{{ $stats['waiting'] }} Menunggu</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                            <span class="font-bold text-slate-600">Proses</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            <span class="font-bold text-slate-600">{{ $stats['done'] }} Selesai</span>
                        </div>
                    </div>
                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">
                        Total {{ $tickets->count() }} dari {{ $stats['total'] }} Laporan Ditampilkan
                    </div>
                </div>
                @endif
            </div>

            <!-- Footer Info -->
            <div class="mt-8 text-center">
                <p class="text-xs font-semibold text-slate-400 uppercase tracking-widest flex items-center justify-center gap-2">
                    <svg class="w-4 h-4 text-orange-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Powered by Diskominfo Kota Binjai © {{ date('Y') }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>