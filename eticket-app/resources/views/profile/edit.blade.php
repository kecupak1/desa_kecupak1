@extends('layouts.app')

@section('content')
    <style>
        .profile-card {
            background: var(--card-bg);
            border: 1px solid var(--border-ui);
            backdrop-filter: blur(16px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 24px;
        }
        
        .profile-text-main { color: var(--text-main); }
        .profile-text-muted { color: var(--text-muted); }

        label, .label, [class*="label"] {
            color: #374151 !important;
            font-weight: 600 !important;
            font-size: 0.75rem !important;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        [data-theme="dark"] label,
        [data-theme="dark"] .label,
        [data-theme="dark"] [class*="label"] {
            color: #9ca3af !important;
        }

        .profile-card p,
        .profile-card span:not(.bg-blue-500):not(.bg-green-500):not(.bg-red-500) {
            color: #4b5563 !important;
        }

        [data-theme="dark"] .profile-card p,
        [data-theme="dark"] .profile-card span:not(.bg-blue-500):not(.bg-green-500):not(.bg-red-500) {
            color: #d1d5db !important;
        }

        .profile-card h2, .profile-card h3,
        .profile-card h4, .profile-card h5 {
            color: #111827 !important;
        }

        [data-theme="dark"] .profile-card h2,
        [data-theme="dark"] .profile-card h3,
        [data-theme="dark"] .profile-card h4,
        [data-theme="dark"] .profile-card h5 {
            color: #f9fafb !important;
        }
        
        input, select, textarea {
            background-color: rgba(0, 0, 0, 0.03) !important;
            color: #111827 !important;
            border-color: var(--border-ui) !important;
            border-radius: 12px !important;
        }

        [data-theme="dark"] input,
        [data-theme="dark"] select,
        [data-theme="dark"] textarea {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: #f9fafb !important;
        }

        .profile-header-gradient {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            border-radius: 32px;
        }

        .profile-avatar-glow { box-shadow: 0 0 40px rgba(255, 255, 255, 0.2); }

        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, var(--border-ui), transparent);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .section-title { color: #111827 !important; }

        [data-theme="dark"] .section-title { color: #f9fafb !important; }

        .main-container-scaled { zoom: 0.9; }

        .user-card-content h5, 
        .user-card-content p, 
        .user-card-content span {
            color: #ffffff !important;
        }

        .delete-form-wrapper p {
            color: #7f1d1d !important;
            font-size: 0.75rem !important;
            font-weight: 500 !important;
            line-height: 1.4 !important;
            opacity: 0.8;
        }
        
        [data-theme="dark"] .delete-form-wrapper p {
            color: #fca5a5 !important;
        }

        .delete-form-wrapper button {
            margin-top: 1rem;
            width: 100%;
            justify-content: center;
            border-radius: 12px !important;
            font-weight: 800 !important;
            letter-spacing: 0.05em;
        }
    </style>

    <div class="main-container-scaled space-y-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        {{-- NOTIFIKASI SUKSES --}}
        @if(session('success'))
        <div class="flex items-center justify-between p-4 rounded-2xl border border-emerald-500/30 bg-emerald-500/10 backdrop-blur-md mb-6">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center shadow-lg">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-emerald-500 text-[10px] font-black uppercase tracking-widest">Berhasil</p>
                    <p class="text-emerald-800 text-xs font-bold">{{ session('success') }}</p>
                </div>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-500 opacity-50 hover:opacity-100">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        @endif

        {{-- BANNER HEADER --}}
        <div class="relative p-12 rounded-[2rem] overflow-hidden shadow-2xl profile-header-gradient">
            <div class="absolute top-0 right-0 w-80 h-80 bg-white/10 rounded-full -mr-40 -mt-40 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-60 h-60 bg-indigo-400/20 rounded-full -ml-30 -mb-30 blur-2xl"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-white uppercase tracking-tighter">Pengaturan Profil</h3>
                    </div>
                    <p class="text-indigo-100 text-sm font-medium max-w-md opacity-80">Konfigurasikan identitas digital dan akses keamanan akun Anda dalam satu tempat.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- KOLOM KIRI: FORMS --}}
            <div class="lg:col-span-2 space-y-8">
                <div class="p-8 profile-card hover-lift">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold section-title uppercase tracking-widest">Informasi Profil</h4>
                    </div>
                    <div class="section-divider mb-8"></div>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="p-8 profile-card hover-lift">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 flex items-center justify-center text-emerald-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold section-title uppercase tracking-widest">Kata Sandi</h4>
                    </div>
                    <div class="section-divider mb-8"></div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- KOLOM KANAN --}}
            <div class="space-y-8">
                {{-- USER ID CARD --}}
                <div class="p-8 rounded-[2.5rem] bg-indigo-600 shadow-2xl text-white text-center hover-lift relative overflow-hidden border border-white/10">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/20 via-transparent to-transparent"></div>
                    
                    <div class="relative z-10 user-card-content">
                        <div class="inline-flex items-center justify-center w-24 h-24 rounded-3xl bg-white/20 backdrop-blur-xl mb-6 text-4xl font-black profile-avatar-glow border-4 border-white/20">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <h5 class="text-2xl font-bold mb-1 tracking-tight">{{ Auth::user()->name }}</h5>
                        <div class="inline-block px-4 py-1 rounded-full bg-black/20 backdrop-blur-md mt-2">
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-white/90">{{ Auth::user()->role }}</p>
                        </div>
                        
                        <div class="mt-8 pt-6 border-t border-white/10">
                            <div class="flex items-center justify-center space-x-2 bg-white/10 p-3 rounded-xl border border-white/5">
                                <svg class="w-4 h-4 text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-indigo-50 text-xs font-medium">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- DANGER ZONE --}}
                <div class="p-8 rounded-[2.5rem] border border-red-200 hover-lift relative overflow-hidden" style="background: rgba(254,242,242,0.5);">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-red-500/5 rounded-full -mr-12 -mt-12 blur-2xl"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-red-500 flex items-center justify-center text-white shadow-lg shadow-red-500/20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </div>
                            <h4 class="text-sm font-black text-red-600 uppercase tracking-widest">Manajemen Akun</h4>
                        </div>
                        
                        <div class="section-divider mb-6 opacity-30"></div>
                        
                        <div class="delete-form-wrapper">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection