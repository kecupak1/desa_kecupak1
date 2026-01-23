<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support | E-Ticket DISKOMINFO Binjai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0b1120;
            background-image: radial-gradient(circle at 20% 10%, rgba(59, 130, 246, 0.08) 0%, transparent 40%);
            color: #f8fafc;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col items-center justify-center p-6">
    
    <div class="max-w-4xl w-full">
        <div class="text-center mb-12">
            <div class="inline-block p-3 rounded-2xl bg-blue-500/10 border border-blue-500/20 mb-4">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <h1 class="text-4xl font-black tracking-tighter uppercase">Pusat <span class="text-blue-500">Bantuan</span></h1>
            <p class="text-slate-400 mt-2">Sistem Manajemen Layanan IT Terpadu Kota Binjai</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-8 rounded-3xl bg-slate-900/40 border border-white/5 backdrop-blur-md shadow-xl hover:border-blue-500/30 transition-all">
                <h3 class="text-xl font-bold mb-4 flex items-center gap-3">
                    <span class="p-2 rounded-lg bg-green-500/20 text-green-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.588-5.946 0-6.556 5.332-11.888 11.888-11.888 3.176 0 6.161 1.237 8.404 3.48s3.481 5.229 3.481 8.404c0 6.556-5.332 11.888-11.888 11.888-2.01 0-3.986-.511-5.741-1.483l-6.243 1.638zm6.005-4.058l.431.256c1.447.86 3.117 1.314 4.839 1.314 5.176 0 9.388-4.212 9.388-9.388 0-2.507-.975-4.864-2.747-6.635-1.771-1.771-4.128-2.748-6.635-2.748-5.176 0-9.388 4.212-9.388 9.388 0 1.956.611 3.864 1.767 5.474l.282.394-1.008 3.682 3.771-.987z"/></svg>
                    </span>
                    Helpdesk WhatsApp
                </h3>
                <p class="text-slate-400 text-sm mb-6 leading-relaxed">Hubungi tim teknis DISKOMINFO untuk kendala login, lupa password, atau error sistem.</p>
                <a href="https://wa.me/628XXXXXXXXXX" class="block w-full py-3 text-center bg-green-600 hover:bg-green-500 text-white font-bold rounded-xl transition-all uppercase text-xs tracking-widest">Chat Sekarang</a>
            </div>

            <div class="p-8 rounded-3xl bg-slate-900/40 border border-white/5 backdrop-blur-md shadow-xl hover:border-blue-500/30 transition-all">
                <h3 class="text-xl font-bold mb-4 flex items-center gap-3">
                    <span class="p-2 rounded-lg bg-blue-500/20 text-blue-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </span>
                    Buku Panduan
                </h3>
                <p class="text-slate-400 text-sm mb-6 leading-relaxed">Pelajari cara penggunaan aplikasi melalui dokumen panduan resmi yang telah kami sediakan.</p>
                <a href="#" class="block w-full py-3 text-center border border-white/10 hover:bg-white/5 text-white font-bold rounded-xl transition-all uppercase text-xs tracking-widest">Download PDF</a>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('login') }}" class="text-slate-500 hover:text-blue-500 transition-colors text-sm font-medium flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Halaman Login
            </a>
        </div>
    </div>

</body>
</html>