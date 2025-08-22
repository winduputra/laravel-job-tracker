<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Job Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-indigo-100 via-blue-100 to-purple-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8 animate-fade-in">
        {{-- Logo --}}
        <div class="mb-8 text-center">
            <img
                src="{{ asset('images/logo.svg') }}"
                alt="Job Tracker"
                class="mx-auto h-20 w-auto drop-shadow-md"
            >          
            <p class="text-gray-500 text-sm">Silakan login untuk melanjutkan</p>
        </div>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-3 rounded-lg mb-4 text-sm border border-red-200">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" required autofocus
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300">
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm mb-2" for="password">Password</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300">
            </div>

            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="mr-2"> Ingat saya
                </label>
                <a href="#" class="text-sm text-indigo-600 hover:underline">Lupa Password?</a>
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                Login
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Daftar</a>
        </p>
    </div>

</body>
</html>
