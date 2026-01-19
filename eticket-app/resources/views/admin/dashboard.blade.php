<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f0f4f8;
        }

        .stat-card {
            transition: all 0.3s ease;
            border: none;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .bg-gradient-admin {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        }

        .glass-header {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>

    <div class="min-h-screen pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-10">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-600 rounded-2xl shadow-lg shadow-blue-200 text-white">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Dashboard Admin</h1>
                        <p class="text-slate-500 font-medium">Kota Binjai - Sistem Pelaporan Terintegrasi</p>
                    </div>
                </div>
                
                <div class="mt-4 md:mt-0">
                    <button class="inline-flex items-center gap-2 px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white rounded-xl font-bold shadow-lg shadow-orange-200 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        BUAT LAPORAN
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="stat-card bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex flex-col justify-between h-40">
                    <div class="flex justify-between items-start">
                        <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Total Masuk</span>
                        <div class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-black text-slate-800">{{ $stats['total'] }}</span>
                        <span class="text-sm font-bold text-slate-400">Tiket</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-full w-full"></div>
                    </div>
                </div>

                <div class="stat-card bg-orange-500 p-6 rounded-3xl shadow-xl shadow-orange-100 flex flex-col justify-between h-40 text-white">
                    <div class="flex justify-between items-start">
                        <span class="text-[11px] font-black uppercase tracking-widest opacity-80">Menunggu</span>
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-black">{{ $stats['waiting'] }}</span>
                        <span class="text-sm font-bold opacity-80">Urgent</span>
                    </div>
                    <p class="text-[10px] font-bold uppercase tracking-tighter">⚠️ Perlu Perhatian Segera</p>
                </div>

                <div class="stat-card bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex flex-col justify-between h-40">
                    <div class="flex justify-between items-start">
                        <span class="text-[11px] font-black text-slate-400 uppercase tracking-widest">Selesai</span>
                        <div class="p-2 bg-emerald-50 text-emerald-600 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-black text-slate-800">{{ $stats['done'] }}</span>
                        <span class="text-sm font-bold text-slate-400">Selesai</span>
                    </div>
                    <div class="w-full bg-slate-100 h-1.5 rounded-full overflow-hidden">
                        <div class="bg-emerald-500 h-full w-[20%]"></div>
                    </div>
                </div>

                <div class="stat-card bg-[#1e3a8a] p-6 rounded-3xl shadow-xl shadow-blue-900/20 flex flex-col justify-between h-40 text-white">
                    <div class="flex justify-between items-start">
                        <span class="text-[11px] font-black uppercase tracking-widest opacity-80">User Aktif</span>
                        <div class="p-2 bg-white/20 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="text-4xl font-black">{{ \App\Models\User::count() }}</span>
                        <span class="text-sm font-bold opacity-80">OPD</span>
                    </div>
                    <p class="text-[10px] font-bold uppercase tracking-tighter">🏢 Instansi Terdaftar</p>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex flex-col md:flex-row justify-between items-center bg-gradient-to-r from-blue-600 to-blue-700 text-white">
                    <div>
                        <h3 class="text-lg font-bold">Laporan Masuk Real-Time</h3>
                        <p class="text-blue-100 text-xs">Update otomatis setiap detik untuk layanan prima.</p>
                    </div>
                    <a href="{{ route('admin.tickets.index') }}" class="mt-4 md:mt-0 px-4 py-2 bg-white/20 hover:bg-white/30 rounded-xl text-xs font-bold transition-all flex items-center gap-2">
                        LIHAT SEMUA <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] bg-slate-50/50">
                                <th class="px-8 py-5 text-left">OPD / Instansi</th>
                                <th class="px-8 py-5 text-left">Judul Kendala</th>
                                <th class="px-8 py-5 text-left">Waktu Lapor</th>
                                <th class="px-8 py-5 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @forelse($tickets as $ticket)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center font-bold text-blue-600 text-xs">
                                            {{ substr($ticket->user->name ?? 'OP', 0, 2) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-slate-700">{{ $ticket->user->name ?? 'OPD Umum' }}</p>
                                            <p class="text-[10px] font-bold text-blue-500 uppercase">#{{ $ticket->ticket_number }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <p class="text-slate-600 font-semibold text-sm">{{ $ticket->title }}</p>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex items-center gap-2 text-slate-400">
                                        <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span class="text-xs font-bold">{{ $ticket->created_at->diffForHumans() }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="flex justify-center">
                                        @php
                                            $color = [
                                                'waiting' => 'bg-orange-500 shadow-orange-200',
                                                'process' => 'bg-blue-500 shadow-blue-200',
                                                'done' => 'bg-emerald-500 shadow-emerald-200'
                                            ][$ticket->status] ?? 'bg-slate-500';
                                        @endphp
                                        <span class="{{ $color }} px-4 py-1.5 rounded-full text-[10px] font-black text-white uppercase shadow-lg">
                                            {{ $ticket->status }}
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-8 py-20 text-center">
                                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" class="w-20 mx-auto opacity-20 mb-4" alt="">
                                    <p class="text-slate-400 font-bold uppercase tracking-widest text-xs">Belum ada laporan hari ini</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>