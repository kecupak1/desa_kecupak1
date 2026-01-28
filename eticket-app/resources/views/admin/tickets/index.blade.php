<x-app-layout>
    <div class="space-y-6">
        {{-- Notifikasi - Adaptif Mode Terang/Gelap --}}
        @if(session('success'))
        <div id="notif-header" 
             class="flex items-center justify-between p-5 rounded-3xl shadow-lg border border-emerald-500/30 bg-emerald-500/10 backdrop-blur-md ring-1 ring-emerald-500/20 animate-fade-in-down">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-emerald-500 rounded-xl flex items-center justify-center shadow-[0_0_15px_rgba(16,185,129,0.4)]">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-emerald-500 dark:text-emerald-400 text-[11px] font-[900] uppercase tracking-wider leading-none">Berhasil Terupdate</p>
                    <p class="text-emerald-600/90 dark:text-emerald-300/80 text-[10px] font-bold mt-1 uppercase tracking-tight">{{ session('success') }}</p>
                </div>
            </div>
            <button onclick="this.parentElement.remove()" class="p-2 hover:bg-emerald-500/20 rounded-lg transition-colors group">
                <svg class="w-4 h-4 text-emerald-500 dark:text-emerald-400" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        @endif

        {{-- Header Section --}}
        <div style="background: var(--card-bg); border: 1px solid var(--border-ui);" 
             class="rounded-3xl p-8 transition-all duration-300 shadow-sm">
            
            <div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-8">
                <div class="flex items-center gap-4">
                    <div class="w-1.5 h-10 bg-blue-600 rounded-full"></div>
                    <div>
                        <h1 style="color: var(--text-main);" class="text-3xl font-[900] tracking-tighter uppercase leading-none">
                            PANEL <span class="text-blue-600">TIKET</span>
                        </h1>
                        <p style="color: var(--text-muted);" class="text-[10px] font-[800] uppercase tracking-[0.3em] mt-1 opacity-50">
                            SISTEM MANAJEMEN BANTUAN DISKOMINFO
                        </p>
                    </div>
                </div>
            </div>

            {{-- Form Filter Utama --}}
            <form action="{{ route('admin.tickets.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-6 border-t" style="border-color: var(--border-ui);">
                <div class="space-y-2">
                    <label style="color: var(--text-muted);" class="text-[9px] font-black uppercase tracking-widest ml-1 opacity-60">URUTAN DATA</label>
                    <select name="sort" onchange="this.form.submit()" 
                            style="background: var(--bg-main); color: var(--text-main); border: 1px solid var(--border-ui);"
                            class="w-full text-xs font-bold rounded-xl px-5 py-3.5 outline-none focus:border-blue-500 transition-all appearance-none cursor-pointer">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>TERBARU</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>TERLAMA</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label style="color: var(--text-muted);" class="text-[9px] font-black uppercase tracking-widest ml-1 opacity-60">FILTER STATUS</label>
                    <select name="status" onchange="this.form.submit()" 
                            style="background: var(--bg-main); color: var(--text-main); border: 1px solid var(--border-ui);"
                            class="w-full text-xs font-bold rounded-xl px-5 py-3.5 outline-none focus:border-blue-500 transition-all appearance-none cursor-pointer">
                        <option value="">SEMUA STATUS</option>
                        <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>WAITING</option>
                        <option value="process" {{ request('status') == 'process' ? 'selected' : '' }}>PROCESS</option>
                        <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>DONE</option>
                    </select>
                </div>
            </form>
        </div>

        {{-- Tabel Section --}}
        <div style="background: var(--card-bg); border: 1px solid var(--border-ui);" class="rounded-3xl overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full border-separate border-spacing-0">
                    <thead>
                        <tr style="background: rgba(0,0,0,0.01);">
                            <th class="px-8 py-5 text-left text-[10px] font-black uppercase tracking-widest" style="color: var(--text-muted); border-bottom: 1px solid var(--border-ui);">INFO TIKET</th>
                            <th class="px-8 py-5 text-center text-[10px] font-black uppercase tracking-widest" style="color: var(--text-muted); border-bottom: 1px solid var(--border-ui);">WAKTU</th>
                            <th class="px-8 py-5 text-center text-[10px] font-black uppercase tracking-widest" style="color: var(--text-muted); border-bottom: 1px solid var(--border-ui);">STATUS</th>
                            <th class="px-8 py-5 text-right text-[10px] font-black uppercase tracking-widest" style="color: var(--text-muted); border-bottom: 1px solid var(--border-ui);">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                        <tr class="hover:bg-blue-600/[0.02] transition-colors group">
                            <td class="px-8 py-6" style="border-bottom: 1px solid var(--border-ui);">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-blue-600 flex items-center justify-center font-black text-white shadow-lg shadow-blue-600/20 uppercase text-sm">
                                        {{ strtoupper(substr($ticket->user->name, 0, 2)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <span class="text-blue-600 text-[9px] font-[900] tracking-widest uppercase block mb-0.5">{{ $ticket->ticket_number }}</span>
                                        <h3 style="color: var(--text-main);" class="font-bold text-base truncate tracking-tight uppercase leading-tight">{{ $ticket->title }}</h3>
                                        <p style="color: var(--text-muted);" class="text-[11px] font-medium opacity-50 italic">Pelapor: {{ $ticket->user->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 text-center" style="border-bottom: 1px solid var(--border-ui);">
                                <p style="color: var(--text-main);" class="font-black text-xs uppercase tracking-tighter">{{ $ticket->created_at->format('d M Y') }}</p>
                                <p style="color: var(--text-muted);" class="text-[10px] font-bold opacity-40">{{ $ticket->created_at->format('H:i') }} WIB</p>
                            </td>
                            {{-- Ubah Status --}}
                            <td class="px-8 py-6 text-center" style="border-bottom: 1px solid var(--border-ui);">
                                <form action="{{ route('admin.tickets.updateStatus', $ticket->id) }}" method="POST" class="flex justify-center">
                                    @csrf @method('PATCH')
                                    <div class="relative group/select">
                                        <select name="status" onchange="this.form.submit()" 
                                            class="appearance-none cursor-pointer rounded-full text-[9px] font-[900] uppercase py-1.5 px-5 pr-8 border transition-all
                                            {{ $ticket->status == 'waiting' ? 'text-orange-500 border-orange-500/20 bg-orange-500/5 hover:border-orange-500' : '' }}
                                            {{ $ticket->status == 'process' ? 'text-blue-500 border-blue-500/20 bg-blue-500/5 hover:border-blue-500' : '' }}
                                            {{ $ticket->status == 'done' ? 'text-emerald-500 border-emerald-500/20 bg-emerald-500/5 hover:border-emerald-500' : '' }}">
                                            <option value="waiting" {{ $ticket->status == 'waiting' ? 'selected' : '' }}>WAITING</option>
                                            <option value="process" {{ $ticket->status == 'process' ? 'selected' : '' }}>PROCESS</option>
                                            <option value="done" {{ $ticket->status == 'done' ? 'selected' : '' }}>DONE</option>
                                        </select>
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none opacity-40">
                                            <svg class="w-2 h-2" fill="currentColor" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td class="px-8 py-6 text-right" style="border-bottom: 1px solid var(--border-ui);">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="p-2.5 rounded-xl text-slate-400 hover:text-blue-600 hover:bg-blue-600/10 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Hapus tiket ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2.5 rounded-xl text-slate-400 hover:text-red-600 hover:bg-red-600/10 transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-8 py-20 text-center">
                                <p style="color: var(--text-muted);" class="text-sm font-bold opacity-50">BELUM ADA DATA TIKET</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>