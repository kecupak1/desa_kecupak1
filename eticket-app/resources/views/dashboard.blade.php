<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

        :root {
            --bg-main: #f4f6f8;
            --bg-card: #ffffff;
            --ink-main: #0f172a;
            --ink-soft: #64748b;
            --line: #e5e7eb;

            --blue: #2563eb;
            --yellow: #facc15;
            --green: #22c55e;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .dashboard-body {
            background: var(--bg-main);
        }

        /* Card base */
        .card {
            background: var(--bg-card);
            border-radius: 16px;
            border: 1px solid var(--line);
            box-shadow: 0 10px 25px rgba(0,0,0,.04);
        }

        /* Button */
        .btn-primary {
            background: var(--blue);
            color: white;
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 700;
            letter-spacing: .05em;
            transition: all .2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37,99,235,.25);
        }

        /* Stat cards */
        .stat-card {
            border-radius: 18px;
            padding: 28px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(
                120deg,
                rgba(255,255,255,.25),
                transparent
            );
        }

        /* Table */
        table {
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        tbody tr {
            background: white;
            transition: all .15s ease;
        }

        tbody tr:hover {
            transform: scale(1.005);
            box-shadow: 0 6px 20px rgba(0,0,0,.06);
        }

        td {
            padding: 18px 24px;
        }

        .badge {
            padding: 6px 14px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }
    </style>

    <div class="min-h-screen dashboard-body py-10 px-6">
        <div class="max-w-7xl mx-auto space-y-12">

            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div>
                    <h1 class="text-4xl font-extrabold text-slate-900">
                        Dashboard Maya
                    </h1>
                    <p class="text-sm text-slate-500 mt-1">
                        Sistem Monitoring & Pelaporan Masyarakat
                    </p>
                </div>

                <a href="{{ route('tickets.create') }}" class="btn-primary">
                    + Buat Laporan Baru
                </a>
            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="stat-card bg-blue-600">
                    <p class="text-sm uppercase tracking-widest opacity-80">
                        Total Tiket
                    </p>
                    <h2 class="text-5xl font-extrabold mt-4">
                        {{ $tickets->count() }}
                    </h2>
                </div>

                <div class="stat-card bg-yellow-400 text-slate-900">
                    <p class="text-sm uppercase tracking-widest opacity-70">
                        Sedang Diproses
                    </p>
                    <h2 class="text-5xl font-extrabold mt-4">
                        {{ $tickets->where('status', 'process')->count() }}
                    </h2>
                </div>

                <div class="stat-card bg-green-500">
                    <p class="text-sm uppercase tracking-widest opacity-80">
                        Tuntas
                    </p>
                    <h2 class="text-5xl font-extrabold mt-4">
                        {{ $tickets->where('status', 'done')->count() }}
                    </h2>
                </div>
            </div>

            <!-- Table -->
            <div class="card overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="font-bold text-lg text-slate-800">
                        Laporan Terbaru
                    </h2>
                    <span class="text-xs text-slate-400 font-semibold">
                        LIVE DATA
                    </span>
                </div>

                <div class="overflow-x-auto px-4 pb-6">
                    <table class="w-full">
                        <thead>
                            <tr class="text-xs text-slate-500 uppercase">
                                <th class="text-left px-6 py-4">Ref ID</th>
                                <th class="text-left px-6 py-4">Permasalahan</th>
                                <th class="text-center px-6 py-4">Status</th>
                                <th class="text-right px-6 py-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tickets->take(5) as $ticket)
                            <tr>
                                <td class="font-bold text-slate-800">
                                    #{{ $ticket->ticket_number }}
                                </td>
                                <td>
                                    <p class="font-semibold text-slate-800">
                                        {{ $ticket->title }}
                                    </p>
                                    <p class="text-xs text-slate-500 mt-1">
                                        {{ $ticket->created_at->format('M d, Y') }} • {{ $ticket->category }}
                                    </p>
                                </td>
                                <td class="text-center">
                                    <span class="badge
                                        {{ $ticket->status == 'done' ? 'bg-green-100 text-green-700' :
                                           ($ticket->status == 'process' ? 'bg-yellow-100 text-yellow-700' :
                                           'bg-blue-100 text-blue-700') }}">
                                        {{ $ticket->status }}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('tickets.show', $ticket) }}"
                                       class="text-sm font-bold text-blue-600 hover:underline">
                                        Buka
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="py-16 text-center text-slate-400 font-semibold">
                                    Belum ada laporan
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center text-xs text-slate-400 font-medium">
                © 2026 DISKOMINFO KOTA BINJAI • Sistem Terintegrasi
            </div>

        </div>
    </div>
</x-app-layout>
