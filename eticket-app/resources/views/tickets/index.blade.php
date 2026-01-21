<x-app-layout>
    {{-- BAGIAN INI YANG PENTING: Menghapus paksa warna putih di elemen luar --}}
    <style>
        /* Mengunci warna background di semua level elemen agar tidak berkedip putih */
        html, body, main, section, .min-h-screen, [role="main"] {
            background-color: #0b1120 !important;
        }

        /* Menghapus background putih bawaan dari layout x-app-layout */
        .bg-white, .bg-gray-100, .bg-gray-50 {
            background-color: transparent !important;
        }

        /* Memastikan navigasi/sidebar tidak terganggu tapi konten tetap gelap */
        .py-12 {
            background-color: #0b1120 !important;
        }
    </style>

    <div class="py-12 min-h-screen">
        <div class="max-w-[1400px] mx-auto sm:px-6 lg:px-8">
            
            {{-- Alert Success --}}
            @if(session('success'))
                <div class="mb-8 flex items-center p-5 bg-blue-600/10 border border-blue-500/30 text-blue-400 rounded-2xl shadow-2xl">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    <span class="font-bold uppercase text-[10px] tracking-widest">{{ session('success') }}</span>
                </div>
            @endif

            {{-- HEADER: Judul & Filter (Desain Dark Dashboard) --}}
            <div class="bg-[#161e31] rounded-[2.5rem] p-8 border border-white/5 mb-8 flex flex-col md:flex-row justify-between items-center gap-6 shadow-2xl">
                <div>
                    <h2 class="text-2xl font-black text-white uppercase tracking-tighter">Daftar Pelayanan Tiket</h2>
                    <p class="text-[10px] font-bold text-slate-500 uppercase mt-1 tracking-widest">Admin Control Panel</p>
                </div>

                <form action="{{ route('admin.tickets.index') }}" method="GET" class="flex gap-3">
                    <select name="sort" onchange="this.form.submit()" class="appearance-none px-6 py-3 bg-[#0b1120] border border-white/10 rounded-xl text-[10px] font-bold uppercase tracking-widest text-slate-400 focus:ring-2 focus:ring-blue-500 cursor-pointer transition-all">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>🕒 Terbaru</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>⏳ Terlama</option>
                    </select>

                    <select name="status" onchange="this.form.submit()" class="appearance-none px-6 py-3 bg-[#0b1120] border border-white/10 rounded-xl text-[10px] font-bold uppercase tracking-widest text-slate-400 focus:ring-2 focus:ring-blue-500 cursor-pointer transition-all">
                        <option value="">📂 Semua Status</option>
                        <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>Waiting</option>
                        <option value="process" {{ request('status') == 'process' ? 'selected' : '' }}>Process</option>
                        <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                </form>
            </div>

            {{-- TABLE: (Navy Dashboard Utama) --}}
            <div class="bg-[#161e31] rounded-[3rem] shadow-2xl border border-white/5 overflow-hidden">
                <table class="w-full text-left border-separate border-spacing-0">
                    <thead>
                        <tr class="bg-[#1c263d]">
                            <th class="px-10 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest">Laporan & Pengirim</th>
                            <th class="px-10 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Waktu</th>
                            <th class="px-10 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Lampiran</th>
                            <th class="px-10 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Update Status</th>
                            <th class="px-10 py-8 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($tickets as $ticket)
                        <tr class="group hover:bg-white/[0.02] transition-colors">
                            <td class="px-10 py-8">
                                <span class="text-[10px] font-black text-blue-500 mb-1 block uppercase tracking-widest">#{{ $ticket->ticket_number ?? 'TCK-'.$ticket->id }}</span>
                                <h4 class="text-sm font-black text-slate-200 uppercase tracking-tight">{{ Str::limit($ticket->title, 40) }}</h4>
                                <div class="flex items-center gap-2 mt-2">
                                    <div class="w-5 h-5 rounded-full bg-[#0b1120] border border-white/10 flex items-center justify-center">
                                        <svg class="w-3 h-3 text-slate-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/></svg>
                                    </div>
                                    <span class="text-[9px] text-slate-500 font-bold uppercase tracking-widest">{{ $ticket->user->name ?? 'Anonim' }}</span>
                                </div>
                            </td>

                            <td class="px-10 py-8 text-center">
                                <span class="text-xs font-bold text-slate-300 block">{{ $ticket->created_at->format('d M Y') }}</span>
                                <span class="text-[9px] font-bold text-blue-500/60 uppercase">{{ $ticket->created_at->format('H:i') }} WIB</span>
                            </td>

                            <td class="px-10 py-8 text-center">
                                @if($ticket->image)
                                    <img src="{{ asset('storage/' . $ticket->image) }}" class="w-12 h-12 object-cover rounded-xl border-2 border-[#0b1120] shadow-lg mx-auto">
                                @else
                                    <span class="text-[9px] font-bold text-slate-700 uppercase italic">No File</span>
                                @endif
                            </td>

                            <td class="px-10 py-8 text-center">
                                <form action="{{ route('admin.tickets.updateStatus', $ticket->id) }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf @method('PATCH')
                                    <select name="status" class="appearance-none pl-4 pr-8 py-2 bg-[#0b1120] border border-white/10 rounded-lg text-[9px] font-bold uppercase text-slate-400 focus:ring-1 focus:ring-blue-600 transition-all cursor-pointer">
                                        <option value="waiting" {{ $ticket->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                                        <option value="process" {{ $ticket->status == 'process' ? 'selected' : '' }}>Process</option>
                                        <option value="done" {{ $ticket->status == 'done' ? 'selected' : '' }}>Done</option>
                                    </select>
                                    <button type="submit" class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white rounded-lg hover:bg-blue-500 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    </button>
                                </form>
                            </td>

                            <td class="px-10 py-8 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="p-2 bg-[#0b1120] text-slate-500 hover:text-blue-400 border border-white/5 rounded-lg transition-all shadow-md">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Hapus laporan?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 bg-[#0b1120] text-slate-600 hover:text-red-500 border border-white/5 rounded-lg transition-all shadow-md">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>