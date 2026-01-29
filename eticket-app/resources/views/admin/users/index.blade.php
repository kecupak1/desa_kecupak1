<x-app-layout>
    <style>
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.25rem;
            zoom: 1.05;
            -moz-transform: scale(1.05);
            -moz-transform-origin: top center;
        }

        /* Header Area */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .btn-tambah {
            background: #3b82f6;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 700;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }

        .btn-tambah:hover {
            background: #2563eb;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* Card Container */
        .user-card {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border-ui);
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            transition: background 0.3s ease;
        }

        .card-header {
            padding: 0.75rem 1.25rem;
            border-bottom: 1px solid var(--border-ui);
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--text-main);
            background: rgba(0, 0, 0, 0.02);
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        /* Table Styling */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table th {
            padding: 0.75rem 1.25rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 800;
            color: var(--text-main);
            border-bottom: 2px solid var(--border-ui);
            background: transparent;
            text-transform: uppercase;
        }

        .custom-table td {
            padding: 1rem 1.25rem;
            font-size: 0.85rem;
            color: var(--text-main);
            border-bottom: 1px solid var(--border-ui);
            vertical-align: middle;
        }

        /* UI Elements */
        .avatar-box {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: #3b82f6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.8rem;
        }

        .status-aktif {
            background: #10b981;
            color: white;
            padding: 0.2rem 0.6rem;
            border-radius: 4px;
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
        }

        .btn-delete-admin {
            background: #ef4444;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .btn-delete-admin:hover { transform: scale(1.1); background: #dc2626; }

        .badge-you {
            background: #3b82f6;
            color: white;
            font-size: 0.6rem;
            padding: 2px 6px;
            border-radius: 4px;
            margin-left: 8px;
            font-weight: 800;
        }

        /* Modal Styles */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 50;
        }
        .modal-box {
            background: var(--card-bg);
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            padding: 1.5rem;
            border: 1px solid var(--border-ui);
        }
    </style>

    <div class="main-content">
        <div class="page-header">
            <div>
                <h1 class="text-2xl font-[900] tracking-tight flex items-center gap-3" style="color: var(--text-main);">
                    <i class="fas fa-users-cog text-blue-500"></i> Manajemen Admin
                </h1>
                <p class="text-sm text-[var(--text-muted)]">Kelola akun administrator sistem</p>
            </div>
            {{-- Tombol untuk buka modal --}}
            <button onclick="document.getElementById('modalAdmin').style.display='flex'" class="btn-tambah">
                <i class="fas fa-user-plus"></i> Tambah Admin
            </button>
        </div>

        <div class="user-card">
            <div class="card-header">
                <i class="fas fa-list-ul text-blue-500"></i> Daftar Administrator
            </div>
            
            <div class="overflow-x-auto">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Terdaftar</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($users->where('role', 'admin') as $user)
                        <tr>
                            <td class="font-bold text-[var(--text-muted)]">{{ $no++ }}</td>
                            <td>
                                <div class="flex items-center gap-3">
                                    <div class="avatar-box">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <span class="font-bold uppercase tracking-tight block">{{ $user->name }}</span>
                                        @if(auth()->id() == $user->id)
                                            <span class="badge-you">YOU</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="text-[var(--text-muted)] font-medium">
                                <i class="far fa-envelope mr-2 text-blue-500/50"></i>{{ $user->email }}
                            </td>
                            <td class="text-[var(--text-muted)] font-medium">
                                <i class="far fa-calendar-alt mr-2 text-blue-500/50"></i>{{ $user->created_at->format('d M Y') }}
                            </td>
                            <td>
                                <span class="status-aktif">Aktif</span>
                            </td>
                            <td class="text-center">
                                <div class="flex justify-center items-center">
                                    @if(auth()->id() != $user->id)
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus akses admin ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-delete-admin">
                                                <i class="fas fa-trash-alt text-xs"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-[var(--text-muted)] text-[0.7rem] font-black uppercase tracking-widest">
                                            <i class="fas fa-lock mr-1"></i> Protected
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="modalAdmin" class="modal-overlay">
        <div class="modal-box">
            <h2 class="text-lg font-black mb-4 uppercase tracking-tighter" style="color: var(--text-main);">Tambah Administrator</h2>
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block text-xs font-bold mb-1 uppercase opacity-60">Nama Lengkap</label>
                    <input type="text" name="name" required class="w-full bg-[var(--bg-main)] border-[var(--border-ui)] rounded-lg text-sm p-2 text-[var(--text-main)]">
                </div>
                <div class="mb-3">
                    <label class="block text-xs font-bold mb-1 uppercase opacity-60">Alamat Email</label>
                    <input type="email" name="email" required class="w-full bg-[var(--bg-main)] border-[var(--border-ui)] rounded-lg text-sm p-2 text-[var(--text-main)]">
                </div>
                <div class="mb-4">
                    <label class="block text-xs font-bold mb-1 uppercase opacity-60">Password</label>
                    <input type="password" name="password" required class="w-full bg-[var(--bg-main)] border-[var(--border-ui)] rounded-lg text-sm p-2 text-[var(--text-main)]">
                </div>
                <div class="flex gap-2">
                    <button type="button" onclick="document.getElementById('modalAdmin').style.display='none'" class="flex-1 py-2 bg-[var(--border-ui)] text-[var(--text-main)] rounded-lg font-bold text-xs uppercase">Batal</button>
                    <button type="submit" class="flex-1 py-2 bg-blue-600 text-white rounded-lg font-bold text-xs uppercase">Simpan Admin</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>