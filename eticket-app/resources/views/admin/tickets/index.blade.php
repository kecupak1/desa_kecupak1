<x-app-layout>
    <style>
        /* Mengunci warna background agar tidak kembali putih saat refresh */
        body { 
            background-color: #0b1120 !important; 
        }
        .main-content { 
            padding-top: 2rem; 
            padding-bottom: 2rem; 
            background-color: #0b1120;
            min-h-screen: 100vh;
        }
        /* Style untuk dropdown agar tidak mencolok putih */
        select option {
            background-color: #161e31;
            color: white;
        }
    </style>

    <div class="main-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Header & Filter --}}
            <div class="bg-[#161e31] rounded-[2rem] p-8 shadow-2xl border border-white/5 mb-6 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-black text-white uppercase tracking-tight">Daftar Pelayanan Tiket</h2>
                    <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mt-1">Management System Diskominfo</p>
                </div>

                <form action="{{ route('admin.tickets.index') }}" method="GET" class="flex gap-3">
                    <select name="sort" onchange="this.form.submit()" class="pl-4 pr-10 py-2.5 bg-[#0b1120] border border-white/10 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-300 focus:ring-2 focus:ring-blue-500 shadow-sm cursor-pointer">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>🕒 Terbaru</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>⏳ Terlama</option>
                    </select>

                    <select name="status" onchange="this.form.submit()" class="pl-4 pr-10 py-2.5 bg-[#0b1120] border border-white/10 rounded-xl text-[10px] font-black uppercase tracking-widest text-slate-300 focus:ring-2 focus:ring-blue-500 shadow-sm cursor-pointer">
                        <option value="">📂 Semua Status</option>
                        <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>Waiting</option>
                        <option value="process" {{ request('status') == 'process' ? 'selected' : '' }}>Process</option>
                        <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                </form>
            </div>

            {{-- Table --}}
            <div class="bg-[#161e31] rounded-[2.5rem] shadow-2xl overflow-hidden border border-white/5">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/[0.02]">
                            <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest">Laporan & Pengirim</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Waktu Masuk</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Lampiran</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-center">Update Status</th>
                            <th class="px-8 py-6 text-[10px] font-black text-slate-500 uppercase tracking-widest text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($tickets as $ticket)
                        <tr class="hover:bg-white/[0.02] transition-all group">
                            <td class="px-8 py-6">
                                <span class="text-[9px] font-black text-blue-500 block mb-1">#{{ $ticket->ticket_number ?? 'TCK-'.$ticket->id }}</span>
                                <h4 class="text-sm font-black text-slate-200 uppercase tracking-tight">{{ Str::limit($ticket->title, 35) }}</h4>
                                <span class="text-[10px] text-slate-500 font-bold uppercase mt-1 block tracking-wider italic">👤 {{ $ticket->user->name ?? 'User' }}</span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="text-xs font-bold text-slate-300 block">{{ $ticket->created_at->format('d M Y') }}</span>
                                <span class="text-[9px] font-black text-blue-500/70 uppercase tracking-tighter">{{ $ticket->created_at->format('H:i') }} WIB</span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                @if($ticket->image)
                                    <img src="{{ asset('storage/' . $ticket->image) }}" class="w-12 h-12 object-cover rounded-xl shadow-md border-2 border-white/10 inline-block">
                                @else
                                    <span class="text-[9px] text-slate-600 italic uppercase font-black">No File</span>
                                @endif
                            </td>
                            <td class="px-8 py-6">
                                <form action="{{ route('admin.tickets.updateStatus', $ticket->id) }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf @method('PATCH')
                                    <select name="status" class="py-1.5 pl-2 pr-8 bg-[#0b1120] border border-white/10 rounded-lg text-[9px] font-black uppercase tracking-widest text-slate-400 focus:ring-1 focus:ring-blue-500">
                                        <option value="waiting" {{ $ticket->status == 'waiting' ? 'selected' : '' }}>Waiting</option>
                                        <option value="process" {{ $ticket->status == 'process' ? 'selected' : '' }}>Process</option>
                                        <option value="done" {{ $ticket->status == 'done' ? 'selected' : '' }}>Done</option>
                                    </select>
                                    <button type="submit" class="p-1.5 bg-blue-600 text-white rounded-lg hover:bg-blue-500 shadow-md active:scale-90 transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    </button>
                                </form>
                            </td>
                            <td class="px-8 py-6 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="w-9 h-9 flex items-center justify-center bg-[#0b1120] text-slate-500 hover:text-white rounded-xl border border-white/5 transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="w-9 h-9 flex items-center justify-center bg-[#0b1120] text-slate-600 hover:text-red-500 rounded-xl border border-white/5 transition-all">
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