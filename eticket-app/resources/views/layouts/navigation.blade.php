<nav x-data="{ open: false }" class="bg-gradient-to-r from-indigo-600 via-indigo-700 to-blue-600 shadow-xl sticky top-0 z-50 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center gap-8">
                <!-- Logo Section -->
                <div class="shrink-0 flex items-center gap-3">
                    <a href="{{ Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="bg-white p-2.5 rounded-xl shadow-lg transform group-hover:scale-105 transition-all duration-300">
                            <x-application-logo class="block h-8 w-auto fill-current text-indigo-600" />
                        </div>
                        <div class="hidden lg:block">
                            <h1 class="text-white font-black text-lg leading-none">E-Ticket Binjai</h1>
                            <p class="text-indigo-200 text-xs font-medium">Pusat Layanan Terpadu</p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:flex">
                    <x-nav-link :href="Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')" 
                                :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard')"
                                class="px-5 py-2.5 rounded-xl text-sm font-bold text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200 {{ request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') ? 'bg-white/20 text-white shadow-lg' : '' }}">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>{{ __('Dashboard') }}</span>
                        </div>
                    </x-nav-link>
                    
                    @if(Auth::user()->role !== 'admin')
                        <x-nav-link :href="route('tickets.index')" :active="request()->routeIs('tickets.*')"
                                    class="px-5 py-2.5 rounded-xl text-sm font-bold text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200 {{ request()->routeIs('tickets.*') ? 'bg-white/20 text-white shadow-lg' : '' }}">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path>
                                </svg>
                                <span>{{ __('Tiket Saya') }}</span>
                            </div>
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->role === 'admin')
                        <x-nav-link :href="route('admin.tickets.index')" :active="request()->routeIs('admin.tickets.*')" 
                                    class="px-5 py-2.5 rounded-xl text-sm font-bold text-white/80 hover:text-white hover:bg-white/10 transition-all duration-200 {{ request()->routeIs('admin.tickets.*') ? 'bg-white/20 text-white shadow-lg' : '' }}">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                                <span>{{ __('Kelola Tiket') }}</span>

                                @php
                                    $waitingCount = \App\Models\Ticket::where('status', 'waiting')->count();
                                @endphp

                                @if($waitingCount > 0)
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-orange-500 text-[10px] font-black text-white shadow-lg animate-pulse ring-2 ring-white">
                                        {{ $waitingCount }}
                                    </span>
                                @endif
                            </div>
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:gap-4">
                <!-- User Profile -->
                <div class="flex items-center gap-3 px-4 py-2.5 bg-white/10 backdrop-blur-md rounded-xl border border-white/20 hover:bg-white/15 transition-all duration-200">
                    <div class="relative">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ Auth::user()->role === 'admin' ? 'from-orange-400 to-orange-600' : 'from-emerald-400 to-emerald-600' }} flex items-center justify-center text-sm font-black text-white shadow-lg">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <div class="w-3 h-3 absolute -right-1 -bottom-1 {{ Auth::user()->role === 'admin' ? 'bg-orange-400' : 'bg-emerald-400' }} rounded-full ring-2 ring-white animate-pulse"></div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-white leading-tight">{{ Auth::user()->name }}</span>
                        <span class="text-xs font-medium text-indigo-200 uppercase leading-tight">{{ Auth::user()->role }}</span>
                    </div>
                </div>

                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            onclick="return confirm('Yakin ingin keluar?')"
                            class="p-3 text-white/70 hover:text-white hover:bg-white/10 rounded-xl transition-all duration-200 group">
                        <svg class="w-5 h-5 group-hover:rotate-12 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Mobile Menu Button -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2.5 rounded-xl text-white/90 hover:bg-white/10 transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-indigo-800/50 backdrop-blur-md border-t border-white/10">
        <div class="pt-4 pb-6 space-y-2 px-4">
            <!-- User Profile Mobile -->
            <div class="mb-4 p-4 bg-white/10 rounded-xl border border-white/20">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ Auth::user()->role === 'admin' ? 'from-orange-400 to-orange-600' : 'from-emerald-400 to-emerald-600' }} flex items-center justify-center text-base font-black text-white shadow-lg">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div class="flex flex-col">
                        <span class="text-base font-bold text-white">{{ Auth::user()->name }}</span>
                        <span class="text-xs font-medium text-indigo-200 uppercase">{{ Auth::user()->role }}</span>
                    </div>
                </div>
            </div>

            <x-responsive-nav-link :href="Auth::user()->role === 'admin' ? route('admin.dashboard') : route('dashboard')" 
                                   :active="request()->routeIs('dashboard') || request()->routeIs('admin.dashboard')"
                                   class="rounded-xl font-bold text-sm text-white/90 hover:bg-white/10 {{ request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') ? 'bg-white/20' : '' }}">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    <span>{{ __('Dashboard') }}</span>
                </div>
            </x-responsive-nav-link>
            
            @if(Auth::user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.tickets.index')" :active="request()->routeIs('admin.tickets.*')" 
                                       class="rounded-xl font-bold text-sm text-white/90 hover:bg-white/10 flex justify-between items-center {{ request()->routeIs('admin.tickets.*') ? 'bg-white/20' : '' }}">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <span>{{ __('Kelola Tiket') }}</span>
                    </div>
                    @if($waitingCount > 0)
                        <span class="bg-orange-500 text-white px-2.5 py-1 rounded-full text-xs font-black shadow-lg">{{ $waitingCount }}</span>
                    @endif
                </x-responsive-nav-link>
            @endif

            <!-- Logout Mobile -->
            <div class="pt-4 mt-4 border-t border-white/20">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3.5 text-white font-bold text-sm bg-red-500/20 hover:bg-red-500/30 rounded-xl flex items-center gap-3 border border-red-500/30 transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>