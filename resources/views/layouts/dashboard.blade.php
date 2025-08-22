<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Tracker')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <nav class="bg-blue-600 text-white p-4 shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard.index') }}" class="font-bold text-lg">Job Tracker</a>
            <div>
                <a href="{{ route('dashboard.index') }}" class="px-3">Lamaran</a>
                <a href="{{ route('logout') }}" class="px-3">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container mx-auto mt-6">
        @yield('content')
    </main>
</body>
</html>
