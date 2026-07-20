<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Kecupak 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login Admin</h2>
        
        @if($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500">
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500">
            </div>

            <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg font-medium hover:bg-green-700 transition">
                Masuk
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-gray-700">Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>