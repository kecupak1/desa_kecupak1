<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin Desa</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:flex flex-col justify-between overflow-y-auto">
            <div>
                <div class="h-20 flex items-center px-6 border-b">
                    <span class="font-bold text-gray-800 text-lg">Admin Desa</span>
                </div>

                <nav class="p-4 space-y-1">
                    <a href="/admin/agenda" class="flex items-center gap-3 px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 transition">📅 Agenda</a>
                    <a href="/admin/berita" class="flex items-center gap-3 px-4 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-100 transition">📰 Berita</a>
                </nav>
            </div>

            <div class="p-4 border-t">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="h-20 bg-white shadow-sm flex items-center justify-between px-6 border-b">
                <h1 class="text-lg font-semibold text-gray-800">Dashboard Pengelolaan Desa</h1>
                <span class="text-sm text-gray-600">Halo, Admin</span>
            </header>

            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>