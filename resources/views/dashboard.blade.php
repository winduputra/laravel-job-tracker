<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Lamaran Kerja</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        dark: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #06b6d4;
            --dark: #0f172a;
            --light: #f8fafc;
        }

        body {
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #f8fafc;
            min-height: 100vh;
        }

        body.light-mode {
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            color: #0f172a;
        }

        .glass-card {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .light-mode .glass-card {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(99, 102, 241, 0.15);
        }

        .stat-card {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            border-radius: 1.5rem;
            overflow: hidden;
            position: relative;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            transform: rotate(30deg);
        }

        .dashboard-header {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .light-mode .dashboard-header {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .nav-item {
            position: relative;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            transition: all 0.3s ease;
        }

        .nav-item.active {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: white;
        }

        .nav-item:hover:not(.active) {
            background: rgba(99, 102, 241, 0.1);
        }

        .theme-toggle {
            width: 50px;
            height: 26px;
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            border-radius: 2rem;
            position: relative;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .theme-toggle::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: white;
            top: 3px;
            left: 3px;
            transition: all 0.3s ease;
        }

        .theme-toggle.active::before {
            left: 27px;
        }

        .theme-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: white;
            transition: all 0.3s ease;
        }

        .sun-icon {
            left: 6px;
            opacity: 0;
        }

        .moon-icon {
            right: 6px;
            opacity: 1;
        }

        .theme-toggle.active .sun-icon {
            opacity: 1;
        }

        .theme-toggle.active .moon-icon {
            opacity: 0;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .form-input {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            color: #f8fafc;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .light-mode .form-input {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: #0f172a;
        }

        .form-input:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        .table-row {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .light-mode .table-row {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .table-row:hover {
            background: rgba(99, 102, 241, 0.05);
        }

        .status-badge {
            padding: 0.35rem 1rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .status-dikirim {
            background: rgba(96, 165, 250, 0.2);
            color: #60a5fa;
        }

        .status-wawancara {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
        }

        .status-diterima {
            background: rgba(52, 211, 153, 0.2);
            color: #34d199;
        }

        .status-ditolak {
            background: rgba(248, 113, 113, 0.2);
            color: #f87171;
        }

        .notification {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
            transform: translateX(150%);
            transition: transform 0.5s ease;
            z-index: 1000;
        }

        .notification.show {
            transform: translateX(0);
        }

        .pulse-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #10b981;
            position: absolute;
            top: -2px;
            right: -2px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            }
            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(16, 185, 129, 0);
            }
            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease forwards;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(30, 41, 59, 0.5);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: #6366f1;
            border-radius: 10px;
        }

        .light-mode ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.5);
        }

        .light-mode ::-webkit-scrollbar-thumb {
            background: #4f46e5;
        }
    </style>
</head>
<body class="min-h-screen p-4 md:p-8">
    <!-- Header dengan navigasi -->
    <div class="dashboard-header p-6 mb-8 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <div class="bg-primary-600 p-3 rounded-xl shadow-lg">
                <i class="fas fa-briefcase text-white text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Job Application Dashboard</h1>
                <p class="text-sm opacity-75">Kelola lamaran kerja Anda dengan mudah</p>
            </div>
        </div>

        <div class="flex items-center space-x-6">
            <!-- Toggle Theme -->
            <div class="flex items-center space-x-4">
                <i class="fas fa-sun text-yellow-400"></i>
                <div class="theme-toggle active" id="theme-toggle">
                    <i class="fas fa-sun theme-icon sun-icon"></i>
                    <i class="fas fa-moon theme-icon moon-icon"></i>
                </div>
                <i class="fas fa-moon text-indigo-400"></i>
            </div>

            <!-- Notifikasi -->
            <div class="relative">
                <button class="p-2 rounded-full bg-dark-800 hover:bg-dark-700 transition">
                    <i class="fas fa-bell text-xl"></i>
                </button>
                <span class="pulse-dot"></span>
            </div>

            <!-- Profil -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-primary-500 to-secondary-400 flex items-center justify-center text-white font-bold">
                    U
                </div>
                <div>
                    <p class="font-semibold">User Name</p>
                    <p class="text-xs opacity-75">Admin</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="glass-card p-6 mb-6">
                <h2 class="text-lg font-bold mb-4">Menu Navigasi</h2>
                <ul class="space-y-2">
                    <li class="nav-item active"><i class="fas fa-home mr-3"></i> Dashboard</li>
                    <li class="nav-item"><i class="fas fa-chart-bar mr-3"></i> Statistik</li>
                    <li class="nav-item"><i class="fas fa-file-alt mr-3"></i> Lamaran</li>
                    <li class="nav-item"><i class="fas fa-cog mr-3"></i> Pengaturan</li>
                    <li class="nav-item"><i class="fas fa-question-circle mr-3"></i> Bantuan</li>
                </ul>
            </div>

            <div class="glass-card p-6">
                <h2 class="text-lg font-bold mb-4">Progress Bulan Ini</h2>
                <div class="flex items-center justify-center mb-4">
                    <div class="relative w-40 h-40">
                        <svg class="w-full h-full" viewBox="0 0 100 100">
                            <circle class="text-dark-700 stroke-current" stroke-width="10" cx="50" cy="50" r="40" fill="transparent"></circle>
                            <circle class="text-primary-500 stroke-current" stroke-width="10" stroke-linecap="round" cx="50" cy="50" r="40" fill="transparent" stroke-dasharray="251.2" stroke-dashoffset="175.84" transform="rotate(-90 50 50)"></circle>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-2xl font-bold">30%</span>
                        </div>
                    </div>
                </div>
                <p class="text-center text-sm opacity-75">30 dari 100 target lamaran</p>
            </div>
        </div>

        <!-- Konten Utama -->
        <div class="lg:col-span-3">
            <!-- Ringkasan Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="stat-card p-6 text-white animate-fade-in">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm opacity-90">Total Lamaran</p>
                            <p class="text-3xl font-bold mt-2">{{ $total ?? 0 }}</p>
                        </div>
                        <div class="bg-white bg-opacity-20 p-3 rounded-xl">
                            <i class="fas fa-file-alt text-xl"></i>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <i class="fas fa-arrow-up text-xs mr-1"></i>
                        <p class="text-xs">+5 dari bulan lalu</p>
                    </div>
                </div>

                <div class="glass-card p-6 animate-fade-in delay-100">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm opacity-75">Wawancara</p>
                            <p class="text-3xl font-bold mt-2 text-yellow-400">{{ $wawancara ?? 0 }}</p>
                        </div>
                        <div class="bg-yellow-400 bg-opacity-20 p-3 rounded-xl">
                            <i class="fas fa-handshake text-xl text-yellow-400"></i>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <i class="fas fa-arrow-up text-xs mr-1 text-yellow-400"></i>
                        <p class="text-xs">+2 dari minggu lalu</p>
                    </div>
                </div>

                <div class="glass-card p-6 animate-fade-in delay-200">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm opacity-75">Diterima</p>
                            <p class="text-3xl font-bold mt-2 text-green-400">{{ $diterima ?? 0 }}</p>
                        </div>
                        <div class="bg-green-400 bg-opacity-20 p-3 rounded-xl">
                            <i class="fas fa-check-circle text-xl text-green-400"></i>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <i class="fas fa-arrow-up text-xs mr-1 text-green-400"></i>
                        <p class="text-xs">+1 dari minggu lalu</p>
                    </div>
                </div>

                <div class="glass-card p-6 animate-fade-in delay-300">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm opacity-75">Ditolak</p>
                            <p class="text-3xl font-bold mt-2 text-red-400">{{ $ditolak ?? 0 }}</p>
                        </div>
                        <div class="bg-red-400 bg-opacity-20 p-3 rounded-xl">
                            <i class="fas fa-times-circle text-xl text-red-400"></i>
                        </div>
                    </div>
                    <div class="flex items-center mt-4">
                        <i class="fas fa-arrow-down text-xs mr-1 text-red-400"></i>
                        <p class="text-xs">-3 dari minggu lalu</p>
                    </div>
                </div>
            </div>

            <!-- Grafik -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <div class="glass-card p-6 animate-fade-in delay-200">
                    <h3 class="text-lg font-bold mb-4">Total Lamaran per Platform</h3>
                    <div style="height: 300px;">
                        <canvas id="platformChart"></canvas>
                    </div>
                </div>
                
                <div class="glass-card p-6 animate-fade-in delay-300">
                    <h3 class="text-lg font-bold mb-4">Status Lamaran</h3>
                    <div style="height: 300px;">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Form Tambah Lamaran -->
            <div class="glass-card p-6 mb-8 animate-fade-in delay-400">
                <h2 class="text-xl font-bold mb-6">Tambah Lamaran Kerja Baru</h2>
                <form action="/dashboard" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium mb-2">Posisi</label>
                        <input type="text" name="posisi" placeholder="Masukkan posisi yang dilamar" class="form-input w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Platform</label>
                        <select name="platform" class="form-input w-full">
                            <option value="">Pilih Platform</option>
                            <option value="LinkedIn">LinkedIn</option>
                            <option value="JobStreet">JobStreet</option>
                            <option value="Indeed">Indeed</option>
                            <option value="Glints">Glints</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">URL Job</label>
                        <input type="url" name="url_job" placeholder="https://..." class="form-input w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Tanggal Lamaran</label>
                        <input type="date" name="tanggal_lamaran" class="form-input w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Dokumen</label>
                        <input type="text" name="dokumen" placeholder="Nama CV, portofolio, dll" class="form-input w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-2">Status</label>
                        <select name="status" class="form-input w-full">
                            <option value="dikirim">Dikirim</option>
                            <option value="wawancara">Wawancara</option>
                            <option value="diterima">Diterima</option>
                            <option value="ditolak">Ditolak</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-2">Keterangan</label>
                        <textarea name="keterangan" rows="3" placeholder="Catatan tambahan, alasan ditolak, dll." class="form-input w-full"></textarea>
                    </div>
                    <div class="md:col-span-2 flex justify-end">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-plus mr-2"></i> Tambah Lamaran
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tabel Lamaran -->
            <div class="glass-card p-6 animate-fade-in">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold">Detail Lamaran Kerja</h2>
                    <div class="flex space-x-3">
                        <button class="p-2 rounded-lg bg-dark-700 hover:bg-dark-600 transition">
                            <i class="fas fa-filter"></i>
                        </button>
                        <button class="p-2 rounded-lg bg-dark-700 hover:bg-dark-600 transition">
                            <i class="fas fa-sort"></i>
                        </button>
                        <button class="p-2 rounded-lg bg-dark-700 hover:bg-dark-600 transition">
                            <i class="fas fa-download"></i>
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left border-b border-dark-700">
                                <th class="pb-3">Posisi</th>
                                <th class="pb-3">Platform</th>
                                <th class="pb-3">Dokumen</th>
                                <th class="pb-3">Tanggal</th>
                                <th class="pb-3">Status</th>
                                <th class="pb-3 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lamarans as $lamaran)
                            <tr class="table-row">
                                <td class="py-4">{{ $lamaran->posisi }}</td>
                                <td class="py-4">{{ $lamaran->platform }}</td>
                                <td class="py-4">{{ $lamaran->dokumen }}</td>
                                <td class="py-4">{{ $lamaran->tanggal_lamaran }}</td>
                                <td class="py-4">
                                    <span class="status-badge status-{{ $lamaran->status }}">
                                        {{ ucfirst($lamaran->status) }}
                                    </span>
                                </td>
                                <td class="py-4 text-right">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('dashboard.edit', $lamaran) }}" class="p-2 rounded-lg bg-blue-500 bg-opacity-20 text-blue-400 hover:bg-opacity-30 transition">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('dashboard.destroy', $lamaran) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lamaran ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg bg-red-500 bg-opacity-20 text-red-400 hover:bg-opacity-30 transition">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between items-center pt-6 mt-6 border-t border-dark-700">
                    <p class="text-sm opacity-75">Menampilkan 5 dari {{ $total ?? 0 }} lamaran</p>
                    <div class="flex space-x-2">
                        <button class="p-2 rounded-lg bg-dark-700 hover:bg-dark-600 transition">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="p-2 rounded-lg bg-primary-500 text-white transition">1</button>
                        <button class="p-2 rounded-lg bg-dark-700 hover:bg-dark-600 transition">2</button>
                        <button class="p-2 rounded-lg bg-dark-700 hover:bg-dark-600 transition">3</button>
                        <button class="p-2 rounded-lg bg-dark-700 hover:bg-dark-600 transition">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifikasi -->
    <div id="success-notification" class="notification">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-xl mr-3"></i>
            <div>
                <p class="font-semibold">Berhasil!</p>
                <p id="notification-message" class="text-sm">Lamaran berhasil ditambahkan</p>
            </div>
        </div>
    </div>

    <script>
        // Data untuk grafik
        const platformData = {
            labels: {!! json_encode(array_keys($platformStats)) !!},
            datasets: [{
                label: 'Total Lamaran',
                data: {!! json_encode(array_values($platformStats)) !!},
                backgroundColor: ['#6366f1', '#f97316', '#10b981', '#8b5cf6', '#ec4899'],
                borderWidth: 0,
                borderRadius: 6
            }]
        };

        const statusData = {
            labels: ['Dikirim', 'Wawancara', 'Diterima', 'Ditolak'],
            datasets: [{
                data: {!! json_encode([$total, $wawancara, $diterima, $ditolak]) !!},
                backgroundColor: ['#6366f1', '#f59e0b', '#10b981', '#ef4444'],
                borderWidth: 0,
                hoverOffset: 12
            }]
        };

        // Inisialisasi Chart.js
        let platformChart, statusChart;

        function initCharts() {
            const platformCtx = document.getElementById('platformChart').getContext('2d');
            const statusCtx = document.getElementById('statusChart').getContext('2d');

            platformChart = new Chart(platformCtx, {
                type: 'bar',
                data: platformData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                color: 'rgba(255, 255, 255, 0.7)'
                            }
                        }
                    }
                }
            });

            statusChart = new Chart(statusCtx, {
                type: 'doughnut',
                data: statusData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: 'rgba(255, 255, 255, 0.7)',
                                padding: 20,
                                usePointStyle: true,
                                pointStyle: 'circle'
                            }
                        }
                    }
                }
            });
        }

        // Toggle tema
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;

        function setTheme(isDark) {
            if (isDark) {
                body.classList.remove('light-mode');
                themeToggle.classList.add('active');
                localStorage.setItem('theme', 'dark');
            } else {
                body.classList.add('light-mode');
                themeToggle.classList.remove('active');
                localStorage.setItem('theme', 'light');
            }
            
            // Update chart colors based on theme
            updateChartsTheme(isDark);
        }

        function updateChartsTheme(isDark) {
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
            const textColor = isDark ? 'rgba(255, 255, 255, 0.7)' : 'rgba(0, 0, 0, 0.7)';
            
            if (platformChart) {
                platformChart.options.scales.y.grid.color = gridColor;
                platformChart.options.scales.y.ticks.color = textColor;
                platformChart.options.scales.x.ticks.color = textColor;
                platformChart.update();
            }
            
            if (statusChart) {
                statusChart.options.plugins.legend.labels.color = textColor;
                statusChart.update();
            }
        }

        // Inisialisasi
        document.addEventListener('DOMContentLoaded', function() {
            // Set tema berdasarkan local storage atau preferensi sistem
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            
            if (savedTheme === 'light' || (!savedTheme && !systemPrefersDark)) {
                setTheme(false);
            } else {
                setTheme(true);
            }
            
            // Inisialisasi chart
            initCharts();
            
            // Event listener untuk toggle tema
            themeToggle.addEventListener('click', function() {
                const isDark = !body.classList.contains('light-mode');
                setTheme(!isDark);
            });
            
            // Notifikasi
            const notification = document.getElementById('success-notification');
            const messageContainer = document.getElementById('notification-message');
            const successMessage = '{{ session('success') }}';
            
            if (successMessage) {
                messageContainer.textContent = successMessage;
                notification.classList.add('show');
                
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 5000);
            }
        });

        // Animasi scroll
        const scrollElements = document.querySelectorAll('.animate-fade-in');
        
        const elementInView = (el, dividend = 1) => {
            const elementTop = el.getBoundingClientRect().top;
            return (
                elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
            );
        };
        
        const displayScrollElement = (element) => {
            element.style.opacity = "1";
            element.style.transform = "translateY(0)";
        };
        
        const handleScrollAnimation = () => {
            scrollElements.forEach((el) => {
                if (elementInView(el, 1.2)) {
                    displayScrollElement(el);
                }
            });
        };
        
        window.addEventListener('scroll', () => {
            handleScrollAnimation();
        });
        
        // Jalanim animasi pertama kali
        handleScrollAnimation();
    </script>
</body>
</html>