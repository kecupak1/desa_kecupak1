<x-app-layout>
    <div class="min-h-screen bg-[#0F172A] py-12"> <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row items-center justify-between gap-6 mb-10 bg-[#1E293B] p-6 rounded-[2.5rem] border border-slate-800 shadow-2xl">
                <div class="flex items-center gap-5">
                    <a href="{{ route('admin.tickets.index') }}" class="group p-4 bg-[#0F172A] border border-slate-700 rounded-2xl hover:bg-indigo-600 transition-all duration-300 shadow-lg">
                        <svg class="w-6 h-6 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div>
                        <h2 class="font-black text-3xl text-white tracking-tight leading-none italic uppercase">Detail <span class="text-indigo-500">Laporan</span></h2>
                        <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mt-2 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-indigo-500"></span>
                            Ticket ID: #{{ $ticket->ticket_number }}
                        </p>
                    </div>
                </div>
                
                <div class="px-8 py-3 {{ $ticket->status == 'done' ? 'bg-emerald-500/10 text-emerald-500 border-emerald-500/20' : ($ticket->status == 'process' ? 'bg-indigo-500/10 text-indigo-400 border-indigo-500/20' : 'bg-amber-500/10 text-amber-500 border-amber-500/20') }} border rounded-2xl text-[11px] font-black uppercase tracking-[0.2em] shadow-inner">
                    Status: {{ $ticket->status }}
                </div>
            </div>

            <div class="bg-[#1E293B] shadow-[0_30px_100px_-15px_rgba(0,0,0,0.4)] rounded-[3.5rem] overflow-hidden border border-slate-800 p-8 sm:p-16 relative">
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-indigo-600/10 blur-[100px] rounded-full"></div>
                
                <div class="flex flex-wrap items-center gap-4 mb-12 relative z-10">
                    <div class="flex items-center px-5 py-2.5 bg-[#0F172A] text-slate-300 rounded-2xl border border-slate-700 shadow-lg">
                        <svg class="w-4 h-4 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="text-[10px] font-black uppercase tracking-widest">{{ $ticket->created_at->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="flex items-center px-5 py-2.5 bg-[#0F172A] text-slate-300 rounded-2xl border border-slate-700 shadow-lg">
                        <svg class="w-4 h-4 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-[10px] font-black uppercase tracking-widest">{{ $ticket->created_at->format('H:i') }} WIB</span>
                    </div>
                    <div class="px-5 py-2.5 bg-rose-500/10 text-rose-400 rounded-2xl border border-rose-500/20 text-[10px] font-black uppercase tracking-widest italic shadow-lg">
                        {{ $ticket->created_at->diffForHumans() }}
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 relative z-10">
                    <div class="lg:col-span-7 space-y-10">
                        <div class="group">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-3 block group-hover:text-indigo-400 transition-colors">Pengirim / Instansi</label>
                            <div class="bg-[#0F172A] p-6 rounded-[2rem] border border-slate-700 group-hover:border-indigo-500/50 transition-all">
                                <p class="font-black text-white text-2xl uppercase tracking-tighter">{{ $ticket->user->name }}</p>
                                <p class="text-sm font-bold text-indigo-400 mt-1 uppercase tracking-widest">{{ $ticket->instansi }}</p>
                            </div>
                        </div>

                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-3 block">Kategori & Subjek</label>
                            <span class="text-[9px] font-black text-indigo-400 bg-indigo-500/10 border border-indigo-500/20 px-4 py-1.5 rounded-full inline-block mb-4 uppercase tracking-[0.2em]">{{ $ticket->category }}</span>
                            <h3 class="font-black text-white text-xl leading-snug uppercase tracking-tight">{{ $ticket->title }}</h3>
                        </div>

                        <div>
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-3 block">Deskripsi Keluhan</label>
                            <div class="bg-[#0F172A]/50 p-8 rounded-[2.5rem] text-slate-300 leading-relaxed text-base italic border border-slate-800 shadow-inner">
                                <span class="text-3xl text-indigo-500 font-serif leading-none">“</span>
                                {{ $ticket->description }}
                                <span class="text-3xl text-indigo-500 font-serif leading-none flex justify-end">”</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-5">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-[0.3em] mb-5 block">Bukti Lampiran</label>
                        @if($ticket->image)
                            <div class="relative group">
                                <div class="absolute -inset-2 bg-gradient-to-tr from-indigo-600 to-purple-600 rounded-[3rem] blur opacity-20 group-hover:opacity-40 transition duration-1000"></div>
                                <a href="{{ asset('storage/' . $ticket->image) }}" target="_blank" class="relative block overflow-hidden rounded-[2.8rem] border-4 border-[#0F172A] shadow-2xl">
                                    <img src="{{ asset('storage/' . $ticket->image) }}" class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-700">
                                    <div class="absolute inset-0 bg-slate-900/60 opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center backdrop-blur-sm">
                                        <div class="bg-white p-4 rounded-2xl shadow-2xl scale-75 group-hover:scale-100 transition-all duration-500">
                                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @else
                            <div class="aspect-square bg-[#0F172A] rounded-[3rem] border-2 border-dashed border-slate-700 flex flex-col items-center justify-center p-10 text-center group">
                                <div class="w-20 h-20 bg-slate-800 rounded-full flex items-center justify-center mb-6 group-hover:bg-slate-700 transition-colors">
                                    <svg class="w-10 h-10 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                                <p class="text-[10px] font-black text-slate-500 uppercase tracking-[0.2em]">Tidak Ada Lampiran</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <p class="text-[9px] font-black text-slate-600 uppercase tracking-[0.5em]">Diskominfostandi Kota Binjai • E-Ticket System v2.0</p>
            </div>
        </div>
    </div>
</x-app-layout>