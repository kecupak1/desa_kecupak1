<x-app-layout>
    <div class="p-6 bg-gradient-to-br from-[#f0f9ff] to-[#fff7ed] min-h-screen font-sans">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div class="relative">
                <div class="absolute -left-2 -top-2 w-12 h-12 bg-orange-200 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                <h3 class="text-3xl font-extrabold text-[#001a3d] tracking-tight relative">
                    ✨ Manajemen <span class="text-orange-500">Laporan Admin</span>
                </h3>
                <p class="text-sm font-medium text-gray-500 mt-1">
                    Selamat bekerja! Ada <span class="text-blue-600 font-bold">{{ $tickets->count() }} tiket</span> yang perlu perhatianmu hari ini.
                </p>
            </div>
            
            <div class="flex flex-wrap items-center gap-3">
                <div class="flex items-center gap-2 bg-white p-2 rounded-2xl shadow-sm border border-orange-100">
                    <span class="text-[10px] font-bold text-orange-400 pl-2 uppercase tracking-tighter">Urutan:</span>
                    <select id="sortOrder" onchange="filterTickets()" class="bg-orange-50 border-none text-xs font-bold rounded-xl px-4 py-2 text-[#001a3d] focus:ring-2 focus:ring-orange-400 transition-all cursor-pointer">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                    </select>
                </div>

                <div class="flex items-center gap-2 bg-white p-2 rounded-2xl shadow-sm border border-orange-100">
                    <span class="text-[10px] font-bold text-orange-400 pl-2 uppercase tracking-tighter">Status:</span>
                    <select id="filterStatus" onchange="filterTickets()" class="bg-orange-50 border-none text-xs font-bold rounded-xl px-4 py-2 text-[#001a3d] focus:ring-2 focus:ring-orange-400 transition-all cursor-pointer">
                        <option value="all">Semua Tiket</option>
                        <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>Waiting</option>
                        <option value="process" {{ request('status') == 'process' ? 'selected' : '' }}>Process</option>
                        <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div id="notification" class="fixed top-6 right-6 z-[100] transform transition-all duration-700 ease-out translate-x-full opacity-0">
                <div class="bg-white border border-gray-100 shadow-[0_10px_40px_rgba(0,0,0,0.08)] rounded-2xl p-5 min-w-[320px] flex items-center gap-5">
                    <div class="relative">
                        <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="absolute -top-1 -right-1 w-3 h-3 bg-emerald-400 rounded-full border-2 border-white"></div>
                    </div>

                    <div class="flex-1">
                        <h4 class="text-[11px] font-extrabold text-emerald-600 uppercase tracking-[0.15em] mb-0.5">Sistem Terupdate</h4>
                        <p class="text-[13px] font-semibold text-[#001a3d]/80 leading-relaxed italic">
                            {{ session('success') }}
                        </p>
                    </div>

                    <button onclick="closeNotif()" class="text-gray-300 hover:text-gray-500 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M6 18L18 6M6 6l12 12" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const notif = document.getElementById('notification');
                    setTimeout(() => {
                        notif.classList.remove('translate-x-full', 'opacity-0');
                        notif.classList.add('translate-x-0', 'opacity-100');
                    }, 100);
                    setTimeout(() => { closeNotif(); }, 5000);
                });

                function closeNotif() {
                    const notif = document.getElementById('notification');
                    if(notif) {
                        notif.classList.remove('translate-x-0', 'opacity-100');
                        notif.classList.add('translate-x-full', 'opacity-0');
                    }
                }
            </script>
        @endif

        <div class="bg-white/70 backdrop-blur-md rounded-[40px] shadow-2xl shadow-orange-100/50 border border-white p-8">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-y-4">
                    <thead>
                        <tr class="text-[11px] font-bold text-gray-400 uppercase tracking-[0.2em]">
                            <th class="px-6 py-4">Informasi Tiket</th>
                            <th class="px-6 py-4 text-center">Waktu Masuk</th>
                            <th class="px-6 py-4 text-center">Lampiran</th>
                            <th class="px-6 py-4 text-center">Status Progress</th>
                            <th class="px-6 py-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr class="group hover:scale-[1.01] transition-all duration-300">
                            
                            <td class="px-6 py-6 bg-white rounded-l-[30px] border-y border-l border-gray-100 group-hover:shadow-lg group-hover:shadow-blue-100/50 transition-all">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-blue-50 rounded-2xl flex items-center justify-center text-blue-500 font-bold text-xs group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div>
                                        <span class="text-[10px] font-black text-blue-400 block tracking-widest uppercase">#{{ $ticket->ticket_number }}</span>
                                        <span class="text-md font-extrabold text-[#001a3d] block capitalize leading-tight mb-1">{{ $ticket->title }}</span>
                                        <span class="px-2 py-0.5 bg-gray-100 rounded-md text-[9px] font-bold text-gray-500 uppercase italic">👤 {{ $ticket->user->name ?? 'User Unknown' }}</span>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-6 bg-white border-y border-gray-100 text-center">
                                <span class="text-sm font-bold text-[#001a3d] block">
                                    {{ $ticket->created_at->addHours(7)->translatedFormat('d F Y') }}
                                </span>
                                <span class="text-[11px] font-bold text-orange-400 flex items-center justify-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $ticket->created_at->addHours(7)->format('H:i') }} WIB
                                </span>
                            </td>

                            <td class="px-6 py-6 bg-white border-y border-gray-100 text-center">
                                <div class="inline-block p-1 bg-gradient-to-tr from-orange-400 to-yellow-300 rounded-2xl shadow-sm">
                                    <div class="w-12 h-12 rounded-[14px] overflow-hidden bg-white border-2 border-white flex items-center justify-center">
                                        @if($ticket->image)
                                            <a href="{{ asset('storage/' . $ticket->image) }}" target="_blank" title="Klik untuk lihat gambar">
                                                <img src="{{ asset('storage/' . $ticket->image) }}"
                                                     class="w-full h-full object-cover hover:scale-125 transition-transform duration-500"
                                                     onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=Error&background=F3F4F6&color=9CA3AF';">
                                            </a>
                                        @else
                                            <div class="w-full h-full flex flex-col items-center justify-center text-[10px] font-bold text-gray-300 uppercase leading-none italic">
                                                <span>No</span>
                                                <span>File</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-6 bg-white border-y border-gray-100">
                                <form action="{{ route('admin.tickets.updateStatus', $ticket->id) }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    
                                    <div class="relative group/select">
                                        <select name="status"
                                            class="appearance-none pl-4 pr-10 py-2.5 rounded-2xl text-[10px] font-black uppercase tracking-wider border-2 border-orange-100 text-[#001a3d] bg-orange-50/50 cursor-pointer hover:border-orange-400 hover:bg-white transition-all focus:ring-0">
                                            <option value="waiting" {{ $ticket->status == 'waiting' ? 'selected' : '' }}>🕒 Menunggu</option>
                                            <option value="process" {{ $ticket->status == 'process' ? 'selected' : '' }}>⚡ Diproses</option>
                                            <option value="done" {{ $ticket->status == 'done' ? 'selected' : '' }}>✅ Selesai</option>
                                        </select>
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-orange-400">
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                        </div>
                                    </div>

                                    <button type="submit" title="Simpan Perubahan" class="p-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:from-orange-500 hover:to-orange-600 shadow-lg shadow-blue-200 hover:shadow-orange-200 transition-all active:scale-90">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                    </button>
                                </form>
                            </td>

                            <td class="px-6 py-6 bg-white rounded-r-[30px] border-y border-r border-gray-100 group-hover:shadow-lg group-hover:shadow-blue-100/50 transition-all text-right">
                                <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tiket ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center bg-red-50 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-300 ml-auto">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function filterTickets() {
            const sort = document.getElementById('sortOrder').value;
            const status = document.getElementById('filterStatus').value;
            let url = new URL(window.location.href);
            url.searchParams.set('sort', sort);
            if (status !== 'all') {
                url.searchParams.set('status', status);
            } else {
                url.searchParams.delete('status');
            }
            window.location.href = url.href;
        }
    </script>

    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
    </style>
</x-app-layout>