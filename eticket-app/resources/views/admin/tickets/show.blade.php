<x-app-layout>
    <style>
        /* Menggunakan font Inter untuk keterbacaan tinggi dan Montserrat untuk kesan premium */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@700;800;900&display=swap');
        
        .font-premium { font-family: 'Montserrat', sans-serif; }
        .font-body { font-family: 'Inter', sans-serif; }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .detail-label {
            color: var(--text-muted);
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            margin-bottom: 0.5rem;
            display: block;
            opacity: 0.7;
        }
    </style>

    <div class="py-10 transition-all duration-500 font-body min-h-screen">
        <div class="max-w-5xl mx-auto px-4 space-y-6">
            
            {{-- Header Section --}}
            <div style="background: var(--card-bg); border: 1px solid var(--border-ui);" 
                 class="flex flex-col md:flex-row items-center justify-between gap-6 p-6 rounded-3xl shadow-sm overflow-hidden relative">
                
                <div class="absolute left-0 top-0 w-1.5 h-full bg-blue-600"></div>

                <div class="flex items-center gap-5">
                    {{-- Tombol Kembali yang diperbaiki --}}
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.tickets.index') : route('dashboard') }}" 
                       style="background: var(--bg-main); border: 1px solid var(--border-ui);"
                       class="group p-3 rounded-2xl hover:bg-blue-600 transition-all duration-300 shadow-sm">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div>
                        <h2 style="color: var(--text-main);" class="font-premium text-2xl tracking-tight uppercase leading-none">
                            Detail <span class="text-blue-600">Laporan</span>
                        </h2>
                        <p style="color: var(--text-muted);" class="text-[10px] font-bold uppercase tracking-[0.2em] mt-2 opacity-60">
                            ID Ticket: <span class="text-blue-500">#{{ $ticket->ticket_number }}</span>
                        </p>
                    </div>
                </div>
                
                <div class="flex items-center gap-3">
                    <div class="text-right hidden md:block">
                        <p style="color: var(--text-muted);" class="text-[9px] font-bold uppercase tracking-widest opacity-50">Status Saat Ini</p>
                        <p class="font-premium text-xs {{ $ticket->status == 'done' ? 'text-emerald-500' : ($ticket->status == 'process' ? 'text-blue-500' : 'text-orange-500') }}">
                            {{ strtoupper($ticket->status) }}
                        </p>
                    </div>
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center shadow-inner
                        {{ $ticket->status == 'done' ? 'bg-emerald-500/10 border border-emerald-500/20' : ($ticket->status == 'process' ? 'bg-blue-500/10 border border-blue-500/20' : 'bg-orange-500/10 border border-orange-500/20') }}">
                        <div class="w-3 h-3 rounded-full {{ $ticket->status == 'done' ? 'bg-emerald-500' : ($ticket->status == 'process' ? 'bg-blue-500' : 'bg-orange-500') }}"></div>
                    </div>
                </div>
            </div>

            {{-- Main Content Card --}}
            <div style="background: var(--card-bg); border: 1px solid var(--border-ui);" 
                 class="shadow-xl rounded-[2.5rem] overflow-hidden relative">
                
                <div class="grid grid-cols-1 lg:grid-cols-12">
                    
                    {{-- Sisi Kiri: Detail Informasi --}}
                    <div class="lg:col-span-7 p-8 md:p-12 space-y-10 border-r" style="border-color: var(--border-ui);">
                        
                        <div class="flex items-center gap-4 text-[10px] font-bold uppercase tracking-wider">
                            <span class="flex items-center py-2 px-4 rounded-lg bg-slate-500/5 border border-slate-500/10" style="color: var(--text-main);">
                                <svg class="w-3.5 h-3.5 mr-2 text-blue-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $ticket->created_at->translatedFormat('d F Y') }}
                            </span>
                            <span class="flex items-center py-2 px-4 rounded-lg bg-slate-500/5 border border-slate-500/10" style="color: var(--text-main);">
                                <svg class="w-3.5 h-3.5 mr-2 text-blue-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{ $ticket->created_at->format('H:i') }} WIB
                            </span>
                        </div>

                        <div class="space-y-8">
                            {{-- Pengirim --}}
                            <div>
                                <span class="detail-label text-blue-600 opacity-100">Informasi Pelapor</span>
                                <div style="background: var(--bg-main); border: 1px solid var(--border-ui);" class="p-6 rounded-2xl shadow-inner border-l-4 border-l-blue-600">
                                    <h3 style="color: var(--text-main);" class="font-premium text-2xl uppercase tracking-tight">{{ $ticket->user->name }}</h3>
                                    <div class="flex items-center mt-2">
                                        <p class="text-xs font-bold text-blue-600 uppercase tracking-widest">{{ $ticket->instansi ?? 'INSTANSI TIDAK TERDAFTAR' }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Subjek --}}
                            <div>
                                <span class="detail-label">Kategori & Topik</span>
                                <div class="mb-2">
                                    <span class="text-[9px] font-extrabold text-white bg-blue-600 px-2.5 py-1 rounded-md uppercase tracking-widest">{{ $ticket->category }}</span>
                                </div>
                                <h4 style="color: var(--text-main);" class="font-premium text-xl uppercase leading-tight tracking-tight">{{ $ticket->title }}</h4>
                            </div>

                            {{-- Keluhan --}}
                            <div>
                                <span class="detail-label">Isi Keluhan / Deskripsi</span>
                                <div style="background: var(--bg-main); border: 1px solid var(--border-ui);" class="p-8 rounded-2xl relative shadow-inner">
                                    <div style="color: var(--text-main);" class="relative z-10 leading-relaxed text-sm font-medium opacity-90 whitespace-pre-line">
                                        {{ $ticket->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Sisi Kanan: Action & Lampiran --}}
                    <div class="lg:col-span-5 p-8 md:p-12 bg-slate-500/5">
                        
                        <div class="space-y-10">
                            {{-- Lampiran --}}
                            <div>
                                <span class="detail-label">Dokumentasi Lampiran</span>
                                @if($ticket->image)
                                    <div class="relative group">
                                        <a href="{{ asset('storage/' . $ticket->image) }}" target="_blank" 
                                           style="border: 6px solid var(--card-bg);"
                                           class="relative block overflow-hidden rounded-2xl shadow-2xl transition-all duration-500 hover:shadow-blue-500/20">
                                            <img src="{{ asset('storage/' . $ticket->image) }}" class="w-full h-auto object-cover min-h-[250px] max-h-[450px]">
                                            <div class="absolute inset-0 bg-blue-600/40 opacity-0 hover:opacity-100 transition-all duration-300 flex items-center justify-center backdrop-blur-sm">
                                                <div class="bg-white text-blue-600 px-5 py-2.5 rounded-xl font-bold text-[10px] uppercase tracking-wider shadow-xl">
                                                    Lihat Foto Penuh
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @else
                                    <div style="background: var(--bg-main); border: 2px dashed var(--border-ui);" 
                                         class="aspect-square rounded-2xl flex flex-col items-center justify-center p-10 text-center opacity-40">
                                        <svg class="w-10 h-10 mb-3 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <p class="text-[9px] font-bold uppercase tracking-widest">Tidak Ada Lampiran</p>
                                    </div>
                                @endif
                            </div>

                            {{-- Admin Status Controller --}}
                            @if(strtolower(auth()->user()->role) === 'admin')
                            <div class="pt-10 border-t" style="border-color: var(--border-ui);">
                                <span class="detail-label text-center mb-6">Pembaruan Status</span>
                                <form action="{{ route('admin.tickets.updateStatus', $ticket) }}" method="POST" class="flex flex-col gap-3">
                                    @csrf @method('PATCH')
                                    
                                    <button name="status" value="waiting" 
                                        class="flex items-center justify-between px-6 py-4 rounded-xl border-2 transition-all duration-300 {{ $ticket->status == 'waiting' ? 'bg-orange-500 border-orange-500 text-white shadow-lg shadow-orange-500/20' : 'bg-transparent border-slate-700/20 text-slate-500 hover:border-orange-500/40' }}">
                                        <span class="font-bold text-[10px] uppercase tracking-widest">Menunggu (Waiting)</span>
                                        <div class="w-2 h-2 rounded-full {{ $ticket->status == 'waiting' ? 'bg-white' : 'bg-slate-600' }}"></div>
                                    </button>

                                    <button name="status" value="process" 
                                        class="flex items-center justify-between px-6 py-4 rounded-xl border-2 transition-all duration-300 {{ $ticket->status == 'process' ? 'bg-blue-600 border-blue-600 text-white shadow-lg shadow-blue-600/20' : 'bg-transparent border-slate-700/20 text-slate-500 hover:border-blue-600/40' }}">
                                        <span class="font-bold text-[10px] uppercase tracking-widest">Diproses (Process)</span>
                                        <div class="w-2 h-2 rounded-full {{ $ticket->status == 'process' ? 'bg-white' : 'bg-slate-600' }}"></div>
                                    </button>

                                    <button name="status" value="done" 
                                        class="flex items-center justify-between px-6 py-4 rounded-xl border-2 transition-all duration-300 {{ $ticket->status == 'done' ? 'bg-emerald-500 border-emerald-500 text-white shadow-lg shadow-emerald-500/20' : 'bg-transparent border-slate-700/20 text-slate-500 hover:border-emerald-500/40' }}">
                                        <span class="font-bold text-[10px] uppercase tracking-widest">Selesai (Done)</span>
                                        <div class="w-2 h-2 rounded-full {{ $ticket->status == 'done' ? 'bg-white' : 'bg-slate-600' }}"></div>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Footer --}}
            <div class="text-center pt-6 opacity-30">
                <p style="color: var(--text-muted);" class="text-[9px] font-bold uppercase tracking-[0.4em]">
                    Diskominfostandi Kota Binjai
                </p>
            </div>
        </div>
    </div>
</x-app-layout>