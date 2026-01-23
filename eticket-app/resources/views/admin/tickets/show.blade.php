<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,900;1,900&family=Poppins:wght@400;500;600;700;800&display=swap');
        .font-premium { font-family: 'Montserrat', sans-serif; }
        .font-body { font-family: 'Poppins', sans-serif; }
    </style>

    <div class="py-6 transition-all duration-500 font-body">
        <div class="max-w-4xl mx-auto px-4 space-y-4">
            
            {{-- Header Section - Fix Link Kembali --}}
            <div style="background: var(--card-bg); border: 1px solid var(--border-ui);" 
                 class="flex flex-col md:flex-row items-center justify-between gap-4 p-4 rounded-2xl shadow-sm">
                <div class="flex items-center gap-4">
                    {{-- Navigasi dikunci ke route index agar tidak refresh di tempat --}}
                    <a href="{{ route('admin.tickets.index') }}" 
                       style="background: var(--bg-main); border: 1px solid var(--border-ui);"
                       class="group p-2.5 rounded-xl hover:bg-blue-600 transition-all duration-300 shadow-sm">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div>
                        <h2 style="color: var(--text-main);" class="font-premium text-xl tracking-tight uppercase leading-none italic">
                            Detail <span class="text-blue-600">Laporan</span>
                        </h2>
                        <p style="color: var(--text-muted);" class="text-[9px] font-extrabold uppercase tracking-[0.2em] mt-1 opacity-60">
                            ID: #{{ $ticket->ticket_number }}
                        </p>
                    </div>
                </div>
                
                <div class="px-5 py-1.5 rounded-lg text-[9px] font-extrabold uppercase tracking-widest border shadow-inner
                    {{ $ticket->status == 'done' ? 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20' : ($ticket->status == 'process' ? 'bg-blue-500/10 text-blue-500 border-blue-500/20' : 'bg-orange-500/10 text-orange-500 border-orange-500/20') }}">
                    STATUS: {{ strtoupper($ticket->status) }}
                </div>
            </div>

            {{-- Main Content Card --}}
            <div style="background: var(--card-bg); border: 1px solid var(--border-ui);" 
                 class="shadow-lg rounded-[2.5rem] overflow-hidden p-6 md:p-10 relative">
                
                {{-- Decorative Glow --}}
                <div class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-blue-600/5 blur-[80px] rounded-full"></div>
                
                {{-- Metadata Row --}}
                <div class="flex flex-wrap items-center gap-3 mb-8 relative z-10 text-[9px] font-black uppercase tracking-widest">
                    <div style="background: var(--bg-main); border: 1px solid var(--border-ui); color: var(--text-main);" class="flex items-center px-4 py-2 rounded-xl shadow-sm">
                        <svg class="w-3.5 h-3.5 mr-2 text-blue-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $ticket->created_at->translatedFormat('d F Y') }}
                    </div>
                    <div style="background: var(--bg-main); border: 1px solid var(--border-ui); color: var(--text-main);" class="flex items-center px-4 py-2 rounded-xl shadow-sm">
                        <svg class="w-3.5 h-3.5 mr-2 text-blue-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $ticket->created_at->format('H:i') }} WIB
                    </div>
                    <div class="px-4 py-2 bg-rose-500/10 text-rose-500 border border-rose-500/20 rounded-xl italic">
                        {{ $ticket->created_at->diffForHumans() }}
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 relative z-10">
                    {{-- Sisi Kiri: Detail Text --}}
                    <div class="lg:col-span-7 space-y-8">
                        <div>
                            <label style="color: var(--text-muted);" class="text-[9px] font-extrabold uppercase tracking-[0.3em] mb-3 block opacity-50">Pengirim / Instansi</label>
                            <div style="background: var(--bg-main); border: 1px solid var(--border-ui);" class="p-6 rounded-2xl shadow-inner group">
                                <p style="color: var(--text-main);" class="font-premium text-xl uppercase tracking-tighter">{{ $ticket->user->name }}</p>
                                <p class="text-[11px] font-bold text-blue-600 mt-1 uppercase tracking-widest italic opacity-80">{{ $ticket->instansi ?? 'Internal Diskominfo' }}</p>
                            </div>
                        </div>

                        <div>
                            <label style="color: var(--text-muted);" class="text-[9px] font-extrabold uppercase tracking-[0.3em] mb-3 block opacity-50">Kategori & Subjek</label>
                            <span class="text-[8px] font-extrabold text-blue-600 bg-blue-600/10 border border-blue-600/20 px-3 py-1 rounded-full mb-3 inline-block uppercase tracking-widest">{{ $ticket->category }}</span>
                            <h3 style="color: var(--text-main);" class="font-premium text-lg uppercase italic leading-tight tracking-tight">{{ $ticket->title }}</h3>
                        </div>

                        <div>
                            <label style="color: var(--text-muted);" class="text-[9px] font-extrabold uppercase tracking-[0.3em] mb-3 block opacity-50">Deskripsi Keluhan</label>
                            <div style="background: var(--bg-main); border: 1px solid var(--border-ui);" class="p-6 rounded-2xl relative shadow-inner italic border-l-4 border-l-blue-600">
                                <div style="color: var(--text-main);" class="relative z-10 leading-relaxed text-sm font-medium opacity-80 whitespace-pre-line">
                                    {{ $ticket->description }}
                                </div>
                            </div>
                        </div>

                        {{-- Admin Update Status --}}
                        @if(strtolower(auth()->user()->role) === 'admin')
                        <div class="pt-6 border-t" style="border-color: var(--border-ui);">
                            <label style="color: var(--text-muted);" class="text-[9px] font-extrabold uppercase tracking-[0.3em] mb-4 block opacity-50 text-center">Update Progress</label>
                            <form action="{{ route('admin.tickets.updateStatus', $ticket) }}" method="POST" class="grid grid-cols-3 gap-3">
                                @csrf @method('PATCH')
                                <button name="status" value="waiting" class="py-2.5 rounded-xl border font-black text-[9px] uppercase transition-all {{ $ticket->status == 'waiting' ? 'bg-orange-500 text-white border-orange-500 shadow-md' : 'bg-transparent text-slate-500 border-slate-700 opacity-40 hover:opacity-100' }}">Waiting</button>
                                <button name="status" value="process" class="py-2.5 rounded-xl border font-black text-[9px] uppercase transition-all {{ $ticket->status == 'process' ? 'bg-blue-600 text-white border-blue-600 shadow-md' : 'bg-transparent text-slate-500 border-slate-700 opacity-40 hover:opacity-100' }}">Process</button>
                                <button name="status" value="done" class="py-2.5 rounded-xl border font-black text-[9px] uppercase transition-all {{ $ticket->status == 'done' ? 'bg-emerald-500 text-white border-emerald-500 shadow-md' : 'bg-transparent text-slate-500 border-slate-700 opacity-40 hover:opacity-100' }}">Done</button>
                            </form>
                        </div>
                        @endif
                    </div>

                    {{-- Sisi Kanan: Lampiran --}}
                    <div class="lg:col-span-5">
                        <label style="color: var(--text-muted);" class="text-[9px] font-extrabold uppercase tracking-[0.3em] mb-4 block opacity-50">Bukti Lampiran</label>
                        @if($ticket->image)
                            <div class="relative group">
                                <a href="{{ asset('storage/' . $ticket->image) }}" target="_blank" 
                                   style="border: 4px solid var(--bg-main);"
                                   class="relative block overflow-hidden rounded-2xl shadow-xl transition-all duration-500 group-hover:scale-[1.02]">
                                    <img src="{{ asset('storage/' . $ticket->image) }}" class="w-full h-auto object-cover max-h-[350px]">
                                    <div class="absolute inset-0 bg-blue-900/40 opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center backdrop-blur-sm">
                                        <div class="bg-white text-blue-600 px-4 py-2 rounded-lg font-premium text-[8px] uppercase tracking-widest shadow-2xl">
                                            Perbesar
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @else
                            <div style="background: var(--bg-main); border: 2px dashed var(--border-ui);" 
                                 class="aspect-video rounded-2xl flex flex-col items-center justify-center p-8 text-center opacity-30">
                                <svg class="w-8 h-8 mb-2 text-slate-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <p class="text-[8px] font-black uppercase tracking-widest">Tidak Ada Lampiran</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Footer Branding --}}
            <div class="text-center pt-4">
                <p style="color: var(--text-muted);" class="text-[8px] font-black uppercase tracking-[0.5em] opacity-30 italic">
                    Diskominfostandi Kota Binjai • E-Ticket System v2.0
                </p>
            </div>
        </div>
    </div>
</x-app-layout>