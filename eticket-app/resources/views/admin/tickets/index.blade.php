@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        {{-- Notifikasi --}}
        @if(session('success'))
        <div id="notif-header" 
             class="flex items-center justify-between p-5 rounded-2xl shadow-lg border border-emerald-500/30 bg-gradient-to-r from-emerald-500/10 to-emerald-600/5 backdrop-blur-sm">
            <div class="flex items-center gap-4">
                <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-emerald-600 text-xs font-bold uppercase tracking-wide">Berhasil</p>
                    <p class="text-emerald-700/90 text-sm font-semibold mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
            <button onclick="this.parentElement.remove()" class="p-2 hover:bg-emerald-500/20 rounded-lg transition-all group">
                <svg class="w-5 h-5 text-emerald-600 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        @endif

        {{-- Header Section --}}
        <div style="background: var(--card-bg); border: 1px solid var(--border-ui);" 
             class="rounded-3xl p-8 shadow-lg relative overflow-hidden">
            
            <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-500/5 to-purple-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            
            <div class="relative">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center shadow-xl shadow-blue-500/30">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 style="color: var(--text-main);" class="text-3xl font-bold tracking-tight mb-1">Panel Tiket</h1>
                            <p style="color: var(--text-muted);" class="text-sm font-medium opacity-70">Sistem Manajemen Bantuan Diskominfo</p>
                        </div>
                    </div>

                    <div class="w-full lg:w-auto flex flex-col sm:flex-row gap-3">
                        <form action="{{ route('admin.tickets.index') }}" method="GET" class="flex gap-2">
                            <div class="relative flex-1 lg:w-80 group">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                       placeholder="Cari tiket..." 
                                       style="background: var(--bg-main); color: var(--text-main); border: 1.5px solid var(--border-ui);"
                                       class="w-full pl-11 pr-4 py-3 rounded-xl text-sm font-medium outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all placeholder:text-sm">
                                <div class="absolute left-3.5 top-1/2 -translate-y-1/2 text-blue-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>
                            
                            @if(request('search'))
                                <a href="{{ route('admin.tickets.index') }}" 
                                   class="w-11 h-11 flex items-center justify-center rounded-xl bg-red-50 text-red-600 hover:bg-red-500 hover:text-white transition-all shadow-sm"
                                   title="Reset Pencarian">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </a>
                            @endif
                        </form>
                    </div>
                </div>

                <form action="{{ route('admin.tickets.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-6 border-t" style="border-color: var(--border-ui);">
                    <div class="space-y-2">
                        <label style="color: var(--text-muted);" class="text-xs font-semibold uppercase tracking-wide ml-1 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"/>
                            </svg>
                            Urutan Data
                        </label>
                        <div class="relative">
                            <select name="sort" onchange="this.form.submit()" 
                                    style="background: var(--bg-main); color: var(--text-main); border: 1.5px solid var(--border-ui);"
                                    class="w-full text-sm font-semibold rounded-xl px-4 py-3 pr-10 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all appearance-none cursor-pointer">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                            </select>
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label style="color: var(--text-muted);" class="text-xs font-semibold uppercase tracking-wide ml-1 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            Filter Status
                        </label>
                        <div class="relative">
                            <select name="status" onchange="this.form.submit()" 
                                    style="background: var(--bg-main); color: var(--text-main); border: 1.5px solid var(--border-ui);"
                                    class="w-full text-sm font-semibold rounded-xl px-4 py-3 pr-10 outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all appearance-none cursor-pointer">
                                <option value="">Semua Status</option>
                                <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>Waiting</option>
                                <option value="process" {{ request('status') == 'process' ? 'selected' : '' }}>Process</option>
                                <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Tabel --}}
        <div style="background: var(--card-bg); border: 1px solid var(--border-ui);" class="rounded-3xl overflow-hidden shadow-lg">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr style="background: var(--bg-main); border-bottom: 1px solid var(--border-ui);">
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">
                                <span class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-600 font-black text-xs">#</span>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Info Tiket</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Waktu</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">WhatsApp</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Status</th>
                            <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wide" style="color: var(--text-muted);">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tickets as $ticket)
                        <tr class="hover:bg-blue-500/5 transition-all group" style="background: var(--card-bg); border-bottom: 1px solid var(--border-ui);">
                            <td class="px-6 py-5">
                                <div class="w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center shadow-sm">
                                    <span class="text-sm font-black text-blue-600">
                                        {{ ($tickets->currentPage() - 1) * $tickets->perPage() + $loop->iteration }}
                                    </span>
                                </div>
                            </td>
                            
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-4">
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-700 flex items-center justify-center font-black text-white shadow-lg uppercase text-base flex-shrink-0 group-hover:scale-105 transition-transform">
                                        {{ strtoupper(substr($ticket->user->name, 0, 2)) }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 bg-blue-500/10 px-2.5 py-1 rounded-lg">
                                                # {{ $ticket->ticket_number }}
                                            </span>
                                        </div>
                                        <h3 style="color: var(--text-main);" class="font-bold text-base truncate mb-1">
                                            {{ $ticket->title }}
                                        </h3>
                                        <div class="flex items-center gap-2">
                                            <svg class="w-4 h-4" style="color: var(--text-muted);" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            <p style="color: var(--text-muted);" class="text-sm font-medium">{{ $ticket->user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-6 py-5 text-center">
                                <div class="inline-flex flex-col items-center gap-1 px-4 py-2.5 rounded-xl border" style="background: var(--bg-main); border-color: var(--border-ui);">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4" style="color: var(--text-muted);" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <p style="color: var(--text-main);" class="font-bold text-sm">{{ $ticket->created_at->format('d M Y') }}</p>
                                    </div>
                                    <p style="color: var(--text-muted);" class="text-xs font-semibold">{{ $ticket->created_at->format('H:i') }} WIB</p>
                                </div>
                            </td>

                            <td class="px-6 py-5 text-center">
                                @if($ticket->whatsapp)
                                    <div class="flex flex-col items-center gap-2">
                                        <span style="color: var(--text-main);" class="text-sm font-bold">{{ $ticket->whatsapp }}</span>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $ticket->whatsapp) }}" 
                                           target="_blank" 
                                           class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-emerald-500 text-white hover:bg-emerald-600 transition-all text-xs font-bold">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                            </svg>
                                            Chat
                                        </a>
                                    </div>
                                @else
                                    <span style="color: var(--text-muted);" class="text-xs italic opacity-50">Tidak ada nomor</span>
                                @endif
                            </td>
                            
                            <td class="px-6 py-5 text-center">
                                @if($ticket->status == 'waiting')
                                    <span class="inline-flex items-center gap-1.5 py-2 px-4 rounded-xl text-xs font-black bg-orange-50 text-orange-600 border border-orange-200 uppercase tracking-wider">
                                        <span class="w-2 h-2 rounded-full bg-orange-500 animate-pulse"></span>
                                        Waiting
                                    </span>
                                @elseif($ticket->status == 'process')
                                    <span class="inline-flex items-center gap-1.5 py-2 px-4 rounded-xl text-xs font-black bg-blue-50 text-blue-600 border border-blue-200 uppercase tracking-wider">
                                        <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                        Process
                                    </span>
                                @elseif($ticket->status == 'done')
                                    <span class="inline-flex items-center gap-1.5 py-2 px-4 rounded-xl text-xs font-black bg-emerald-50 text-emerald-600 border border-emerald-200 uppercase tracking-wider">
                                        <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Done
                                    </span>
                                @endif
                            </td>
                            
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.tickets.show', $ticket->id) }}" 
                                       class="w-10 h-10 rounded-xl flex items-center justify-center hover:bg-blue-500 transition-all group/btn border hover:border-blue-500"
                                       style="background: var(--bg-main); border-color: var(--border-ui);"
                                       title="Lihat Detail">
                                        <svg class="w-5 h-5 group-hover/btn:text-white transition-all" style="color: var(--text-muted);" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Hapus tiket ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                class="w-10 h-10 rounded-xl flex items-center justify-center hover:bg-red-500 transition-all group/btn border hover:border-red-500"
                                                style="background: var(--bg-main); border-color: var(--border-ui);"
                                                title="Hapus Tiket">
                                            <svg class="w-5 h-5 group-hover/btn:text-white transition-all" style="color: var(--text-muted);" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center justify-center gap-4">
                                    <div class="w-24 h-24 rounded-3xl flex items-center justify-center border" style="background: var(--bg-main); border-color: var(--border-ui);">
                                        <svg class="w-12 h-12" style="color: var(--text-muted); opacity: 0.3;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p style="color: var(--text-main);" class="text-lg font-bold mb-1">Tidak Ada Data</p>
                                        <p style="color: var(--text-muted);" class="text-sm font-medium">Belum ada tiket yang ditemukan</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 px-2">
            <p style="color: var(--text-muted);" class="text-sm font-semibold flex items-center gap-2">
                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Menampilkan <span class="font-bold text-blue-600 mx-1">{{ $tickets->count() }}</span> dari <span class="font-bold text-blue-600 mx-1">{{ $tickets->total() }}</span> data
            </p>
            
            <div class="flex items-center gap-2">
                @if($tickets->onFirstPage())
                    <span class="w-10 h-10 flex items-center justify-center rounded-xl opacity-30 border" style="border-color: var(--border-ui); color: var(--text-muted);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $tickets->previousPageUrl() }}" 
                       class="w-10 h-10 flex items-center justify-center rounded-xl border-2 hover:bg-blue-600 hover:border-blue-600 hover:text-white transition-all" 
                       style="border-color: var(--border-ui); background: var(--card-bg); color: var(--text-main);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                @endif

                @foreach ($tickets->getUrlRange(max(1, $tickets->currentPage() - 2), min($tickets->lastPage(), $tickets->currentPage() + 2)) as $page => $url)
                    @if ($page == $tickets->currentPage())
                        <span class="min-w-10 h-10 flex items-center justify-center rounded-xl bg-gradient-to-br from-blue-600 to-blue-700 text-white text-sm font-bold px-4">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" 
                           class="min-w-10 h-10 flex items-center justify-center rounded-xl border-2 hover:border-blue-600 transition-all text-sm font-bold px-4" 
                           style="border-color: var(--border-ui); background: var(--card-bg); color: var(--text-main);">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if($tickets->hasMorePages())
                    <a href="{{ $tickets->nextPageUrl() }}" 
                       class="w-10 h-10 flex items-center justify-center rounded-xl border-2 hover:bg-blue-600 hover:border-blue-600 hover:text-white transition-all" 
                       style="border-color: var(--border-ui); background: var(--card-bg); color: var(--text-main);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span class="w-10 h-10 flex items-center justify-center rounded-xl opacity-30 border" style="border-color: var(--border-ui); color: var(--text-muted);">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                @endif
            </div>
        </div>
    </div>

@endsection