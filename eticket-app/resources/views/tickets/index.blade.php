<x-app-layout>
    <style>
        /* Definisi variabel khusus halaman profil agar adaptif */
        .profile-card {
            background: var(--card-bg);
            border: 1px solid var(--border-ui);
            backdrop-filter: blur(12px);
            transition: all 0.3s ease;
        }
        
        .profile-text-main { color: var(--text-main); }
        .profile-text-muted { color: var(--text-muted); }
        
        /* Memastikan input di dalam partials tetap terbaca */
        input, select, textarea {
            background-color: rgba(0, 0, 0, 0.05) !important;
            color: var(--text-main) !important;
            border-color: var(--border-ui) !important;
        }

        [data-theme="dark"] input {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }
    </style>

    <div class="space-y-8">
        <div class="relative p-8 rounded-3xl overflow-hidden shadow-2xl profile-card">
            <div class="relative z-10">
                <h3 class="text-2xl font-black profile-text-main uppercase tracking-tight">
                    Pengaturan <span class="text-blue-500">Profil</span>
                </h3>
                <p class="profile-text-muted text-sm mt-1">Kelola informasi identitas dan keamanan akun Anda.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <div class="p-8 rounded-3xl profile-card">
                    <div class="profile-text-main">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-8 rounded-3xl profile-card">
                    <div class="profile-text-main">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <div class="p-8 rounded-3xl bg-blue-600 shadow-xl text-white text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-white/10 mb-4 text-3xl font-black">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <h5 class="text-xl font-bold">{{ Auth::user()->name }}</h5>
                    <p class="text-blue-200 text-xs font-bold uppercase tracking-widest">{{ Auth::user()->role }}</p>
                </div>

                <div class="p-8 rounded-3xl bg-red-900/10 border border-red-500/20">
                    <div class="profile-text-main">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>