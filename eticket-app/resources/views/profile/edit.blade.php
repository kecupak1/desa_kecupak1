<x-app-layout>
    <style>
        /* Definisi variabel khusus halaman profil agar adaptif */
        .profile-card {
            background: var(--card-bg);
            border: 1px solid var(--border-ui);
            backdrop-filter: blur(12px);
            transition: all 0.3s ease;
        }
        
        .profile-text-main { 
            color: var(--text-main);
        }
        
        .profile-text-muted { 
            color: var(--text-muted);
        }

        /* CRITICAL FIX - Force label visibility */
        label, .label, [class*="label"] {
            color: #374151 !important;
            font-weight: 600 !important;
        }

        [data-theme="dark"] label,
        [data-theme="dark"] .label,
        [data-theme="dark"] [class*="label"] {
            color: #d1d5db !important;
        }

        /* Force paragraph and text visibility in forms */
        .profile-card p,
        .profile-card span:not(.bg-blue-500):not(.bg-green-500):not(.bg-red-500) {
            color: #4b5563 !important;
        }

        [data-theme="dark"] .profile-card p,
        [data-theme="dark"] .profile-card span:not(.bg-blue-500):not(.bg-green-500):not(.bg-red-500) {
            color: #d1d5db !important;
        }

        /* Heading visibility */
        .profile-card h2,
        .profile-card h3,
        .profile-card h4,
        .profile-card h5 {
            color: #111827 !important;
        }

        [data-theme="dark"] .profile-card h2,
        [data-theme="dark"] .profile-card h3,
        [data-theme="dark"] .profile-card h4,
        [data-theme="dark"] .profile-card h5 {
            color: #f9fafb !important;
        }
        
        /* Memastikan input di dalam partials tetap terbaca */
        input, select, textarea {
            background-color: rgba(0, 0, 0, 0.05) !important;
            color: #111827 !important;
            border-color: var(--border-ui) !important;
        }

        [data-theme="dark"] input,
        [data-theme="dark"] select,
        [data-theme="dark"] textarea {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: #f9fafb !important;
        }

        /* Enhanced Profile Styles */
        .profile-header-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        [data-theme="dark"] .profile-header-gradient {
            background: linear-gradient(135deg, #4c63d2 0%, #5a3a7f 100%);
        }

        .profile-avatar-glow {
            box-shadow: 0 0 40px rgba(102, 126, 234, 0.4);
        }

        [data-theme="dark"] .profile-avatar-glow {
            box-shadow: 0 0 40px rgba(102, 126, 234, 0.6);
        }

        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #e5e7eb, transparent);
        }

        [data-theme="dark"] .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #374151, transparent);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        [data-theme="dark"] .hover-lift:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
        }

        /* Icon colors */
        .icon-info {
            color: #3b82f6;
        }

        .icon-lock {
            color: #10b981;
        }

        .icon-danger {
            color: #ef4444;
        }

        /* Section titles - very specific */
        .section-title {
            color: #111827 !important;
        }

        [data-theme="dark"] .section-title {
            color: #f9fafb !important;
        }

        /* Delete account specific text */
        .text-red-600,
        .text-red-700,
        .text-red-800 {
            color: #dc2626 !important;
        }

        [data-theme="dark"] .text-red-600,
        [data-theme="dark"] .text-red-700,
        [data-theme="dark"] .text-red-800 {
            color: #fca5a5 !important;
        }

        /* Delete section paragraph text */
        .bg-gradient-to-br p,
        .bg-gradient-to-br span:not(.text-white) {
            color: #7f1d1d !important;
        }

        [data-theme="dark"] .bg-gradient-to-br p,
        [data-theme="dark"] .bg-gradient-to-br span:not(.text-white) {
            color: #fca5a5 !important;
        }

        /* Zona Berbahaya title */
        .danger-title {
            color: #b91c1c !important;
        }

        [data-theme="dark"] .danger-title {
            color: #fca5a5 !important;
        }

        /* Custom Scaling for Laptop standard */
        .main-container-scaled {
            zoom: 0.9;
        }
    </style>

    <div class="main-container-scaled space-y-8 max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="relative p-10 rounded-3xl overflow-hidden shadow-2xl profile-header-gradient">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
            
            <div class="relative z-10">
                <div class="flex items-center space-x-3 mb-3">
                    <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-black text-white uppercase tracking-tight">
                        Pengaturan Profil
                    </h3>
                </div>
                <p class="text-white/90 text-sm ml-15">Kelola informasi identitas dan keamanan akun Anda dengan aman.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <div class="p-8 rounded-3xl profile-card hover-lift">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-blue-500/10 flex items-center justify-center">
                            <svg class="w-5 h-5 icon-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 1118 0z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold section-title uppercase tracking-wide">Informasi Profil</h4>
                    </div>
                    <div class="section-divider mb-6"></div>
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="p-8 rounded-3xl profile-card hover-lift">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-green-500/10 flex items-center justify-center">
                            <svg class="w-5 h-5 icon-lock" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold section-title uppercase tracking-wide">Perbarui Password</h4>
                    </div>
                    <div class="section-divider mb-6"></div>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="space-y-8">
                <div class="p-8 rounded-3xl bg-gradient-to-br from-blue-500 to-blue-600 shadow-xl text-white text-center hover-lift overflow-hidden relative">
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white rounded-full -mr-16 -mt-16"></div>
                        <div class="absolute bottom-0 left-0 w-24 h-24 bg-white rounded-full -ml-12 -mb-12"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="inline-flex items-center justify-center w-24 h-24 rounded-2xl bg-white/20 backdrop-blur-sm mb-5 text-4xl font-black profile-avatar-glow border-4 border-white/30">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <h5 class="text-2xl font-bold mb-1 text-white">{{ Auth::user()->name }}</h5>
                        <div class="inline-block px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-sm mt-2">
                            <p class="text-xs font-bold uppercase tracking-widest text-white">{{ Auth::user()->role }}</p>
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-white/20">
                            <div class="flex items-center justify-center space-x-2 text-sm">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-white text-xs">{{ Auth::user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-8 rounded-3xl bg-gradient-to-br from-red-50 to-red-100 border-2 border-red-300 hover-lift">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-red-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 icon-danger" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-bold danger-title uppercase tracking-wide">Zona Berbahaya</h4>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>