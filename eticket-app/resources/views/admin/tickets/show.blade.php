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
        
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }
    </style>

    <div class="py-10 transition-all duration-500 font-body min-h-screen">
        <div class="max-w-5xl mx-auto px-4 space-y-6">
            
            {{-- Flash Message Alert --}}
            @if(session('success'))
            <div class="bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 px-6 py-4 rounded-2xl flex items-center gap-4 animate-fade-in">
                <div class="w-10 h-10 rounded-xl bg-emerald-500/20 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-bold text-sm uppercase tracking-wider">Berhasil!</p>
                    <p class="text-xs opacity-80 mt-1">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-300 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            @endif

            @if(session('error'))
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-6 py-4 rounded-2xl flex items-center gap-4 animate-fade-in">
                <div class="w-10 h-10 rounded-xl bg-red-500/20 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-bold text-sm uppercase tracking-wider">Gagal!</p>
                    <p class="text-xs opacity-80 mt-1">{{ session('error') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-red-400 hover:text-red-300 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            @endif

            {{-- Header Section --}}
            <div style="background: var(--card-bg); border: 1px solid var(--border-ui);" 
                 class="flex flex-col md:flex-row items-center justify-between gap-6 p-6 rounded-3xl shadow-sm overflow-hidden relative">
                
                <div class="absolute left-0 top-0 w-1.5 h-full bg-blue-600"></div>

                <div class="flex items-center gap-5">
                    {{-- Tombol Kembali - Diarahkan ke Kelola Tiket (Admin) --}}
                    <a href="{{ route('admin.tickets.index') }}" 
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
                        <p class="font-premium text-xs {{ $ticket->status == 'done' ? 'text-emerald-500' : ($ticket->status == 'process' ? 'text-blue-500' : 'text-yellow-500') }}">
                            {{ strtoupper($ticket->status) }}
                        </p>
                    </div>
                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center shadow-inner
                        {{ $ticket->status == 'done' ? 'bg-emerald-500/10 border border-emerald-500/20' : ($ticket->status == 'process' ? 'bg-blue-500/10 border border-blue-500/20' : 'bg-yellow-500/10 border border-yellow-500/20') }}">
                        <div class="w-3 h-3 rounded-full {{ $ticket->status == 'done' ? 'bg-emerald-500' : ($ticket->status == 'process' ? 'bg-blue-500' : 'bg-yellow-500') }}"></div>
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

                                {{-- Admin Status Controller - DI BAWAH GAMBAR --}}
                                @if(strtolower(trim(auth()->user()->role)) === 'admin')
                                <div class="mt-8 pt-8 border-t" style="border-color: var(--border-ui);">
                                    <span class="detail-label text-center mb-6 block">Pembaruan Status</span>
                                    <form action="{{ route('admin.tickets.updateStatus', $ticket) }}" method="POST" class="flex flex-col gap-3">
                                        @csrf @method('PATCH')
                                        
                                        {{-- Hidden inputs untuk mengirim data user ke controller agar bisa buat link WA --}}
                                        <input type="hidden" name="phone" value="{{ $ticket->user->phone }}">
                                        <input type="hidden" name="ticket_number" value="{{ $ticket->ticket_number }}">

                                        <button name="status" value="waiting" 
                                            class="flex items-center justify-between px-6 py-4 rounded-xl border-2 transition-all duration-300 {{ $ticket->status == 'waiting' ? 'bg-yellow-500 border-yellow-500 text-white shadow-lg shadow-yellow-500/20' : 'bg-transparent border-slate-700/20 text-slate-500 hover:border-yellow-500/40' }}">
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
            </div>

            {{-- Footer --}}
            <div class="text-center pt-6 opacity-30">
                <p style="color: var(--text-muted);" class="text-[9px] font-bold uppercase tracking-[0.4em]">
                    Diskominfostandi Kota Binjai
                </p>
            </div>
        </div>
    </div>

  {{-- Auto Open WhatsApp Script --}}
    @if(session('waUrl'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const waUrl = "{!! session('waUrl') !!}";
            
            if (waUrl) {
                // Mencoba membuka otomatis
                const win = window.open(waUrl, '_blank');
                
                // Jika diblokir browser, munculkan tombol melayang agar admin bisa klik manual
                if (!win || win.closed || typeof win.closed == 'undefined') {
                    const div = document.createElement('div');
                    div.innerHTML = `
                        <div style="position: fixed; bottom: 30px; right: 30px; z-index: 9999; animate-fade-in">
                            <a href="${waUrl}" target="_blank" 
                               style="background: #25D366; color: white; padding: 16px 24px; border-radius: 16px; text-decoration: none; font-weight: bold; box-shadow: 0 10px 25px rgba(37,211,102,0.3); display: flex; align-items: center; gap: 10px; border: 2px solid white;">
                                <svg style="width: 20px; height: 20px" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.414 0 0 5.414 0 12.05c0 2.123.555 4.197 1.61 6.06L0 24l6.095-1.599a11.77 11.77 0 005.95 1.6h.005c6.635 0 12.05-5.414 12.05-12.05a11.77 11.77 0 00-3.41-8.435z"/></svg>
                                KIRIM PESAN WA
                            </a>
                        </div>
                    `;
                    document.body.appendChild(div);
                }
            }
        });
    </script>
    @endif
</x-app-layout>