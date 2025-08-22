<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Lamaran Kerja</title>
    <!-- Import font Inter dari Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }
        body {
            background-color: #0f172a;
            color: #f8fafc;
        }
        .card {
            background-color: #1e293b;
            border-color: #475569;
            border-width: 1.5px;
            box-shadow: 0 4px 24px 0 rgba(30,41,59,0.12);
            transition: box-shadow 0.2s;
        }
        .card:hover {
            box-shadow: 0 8px 32px 0 rgba(99,102,241,0.15);
        }
        .dark-text { color: #f8fafc; }
        input[type="text"], input[type="url"], input[type="date"], select, textarea {
            background-color: #1e293b !important;
            border-color: #475569 !important;
            color: #f8fafc !important;
            padding: 0.75rem 1rem !important;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.5);
        }
        body.light-mode {
            background-color: #f1f5f9;
            color: #1a202c;
        }
        .light-mode .card {
            background-color: #ffffff;
            border-color: #e2e8f0;
        }
        .light-mode .dark-text { color: #1a202c; }
        .light-mode input[type="text"], .light-mode input[type="url"], .light-mode input[type="date"], .light-mode select, .light-mode textarea {
            background-color: #f9fafb !important;
            border-color: #cbd5e1 !important;
            color: #1a202c !important;
            padding: 0.75rem 1rem !important;
        }
        .light-mode input:focus, .light-mode select:focus, .light-mode textarea:focus {
            border-color: #4f46e5 !important;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.5);
        }
        .light-mode thead tr th {
            background-color: #e2e8f0;
            color: #1a202c;
        }
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #1e293b; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #475569; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #6366f1; }
        .light-mode ::-webkit-scrollbar-track { background: #e2e8f0; }
        .light-mode ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .light-mode ::-webkit-scrollbar-thumb:hover { background: #4f46e5; }
        /* Header styling */
        .dashboard-header {
            background: rgba(30,41,59,0.85);
            border-radius: 1.5rem;
            box-shadow: 0 4px 24px 0 rgba(30,41,59,0.12);
            padding: 1.5rem 2rem;
            margin-bottom: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .light-mode .dashboard-header {
            background: rgba(255,255,255,0.85);
            box-shadow: 0 4px 24px 0 rgba(99,102,241,0.08);
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .logo-title {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.02em;
        }
        .logo-svg {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body class="min-h-screen p-4 md:p-8">

    <!-- Header dengan Logo, Tombol Logout dan Tema -->
    <div class="dashboard-header">
        <div class="logo-container">
            <!-- Logo Image -->
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo-svg">
            <span class="logo-title dark-text">Dashboard Lamaran Kerja</span>
        </div>
        <div class="flex items-center space-x-4">
            <!-- Tombol untuk beralih mode gelap/terang -->
            <button id="theme-toggle" class="p-2 rounded-full transition-colors duration-300 hover:bg-indigo-600/20">
                <!-- SVG untuk ikon bulan (gelap) dan matahari (terang) -->
                <svg id="moon-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 dark-text" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21.73,15.71a1.2,1.2,0,0,1-.53.53A8.93,8.93,0,0,1,10,2.15,9,9,0,1,1,21.73,15.71Z" />
                </svg>
                <svg id="sun-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden dark-text" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12,18a6,6,0,1,0-6-6A6,6,0,0,0,12,18Zm0-14a1,1,0,0,0,0,2h0a1,1,0,0,0,0-2Zm0,12a1,1,0,0,0,0,2h0a1,1,0,0,0,0-2ZM12,6a1,1,0,0,0-1,1V8a1,1,0,0,0,2,0V7A1,1,0,0,0,12,6Zm-6,6a1,1,0,0,0,1,1H8a1,1,0,0,0,0-2H7A1,1,0,0,0,6,12Zm14,0a1,1,0,0,0-1-1H16a1,1,0,0,0,0,2h1A1,1,0,0,0,20,12ZM7.76,7.76a1,1,0,0,0-1.41-1.41L5.6,7.15A1,1,0,0,0,7,8.56ZM16.24,16.24a1,1,0,0,0,1.41,1.41l1.41-1.41A1,1,0,0,0,17,14.84Zm0-8.48,1.41-1.41a1,1,0,0,0-1.41-1.41L14.84,7A1,1,0,0,0,16.24,8.48Zm-8.48,8.48L5.6,17A1,1,0,0,0,7,18.41L8.41,17A1,1,0,0,0,7.76,16.24Z" />
                </svg>
            </button>
            <form action="/logout" method="POST">
                <!-- Tambahkan token CSRF untuk formulir logout -->
                @csrf
                <button type="submit" class="bg-red-600 text-white font-semibold py-2 px-6 rounded-full shadow-lg hover:bg-red-700 transition duration-300">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Container Utama -->
    <div class="space-y-8">
        <!-- Bagian 1: Formulir Tambah Lamaran Baru -->
        <div class="card p-6 md:p-8 rounded-3xl shadow-2xl shadow-md 
            hover:-translate-y-2 hover:shadow-lg
            transition transform duration-300 cursor-pointer">
            <h2 class="text-2xl font-bold mb-6 dark-text">Tambah Lamaran Kerja Baru</h2>
            <!-- Ubah action ke rute yang benar dan tambahkan CSRF token -->
            <form action="/dashboard" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                @csrf
                <!-- Input Posisi dan Platform -->
                <div>
                    <label for="posisi" class="block text-sm font-medium text-gray-400 dark-text mb-1">Posisi</label>
                    <input type="text" id="posisi" name="posisi" placeholder="Masukkan posisi yang dilamar" class="w-full rounded-lg border-2 shadow-sm focus:ring-indigo-500">
                </div>
                <div>
                    <label for="platform" class="block text-sm font-medium text-gray-400 dark-text mb-1">Platform</label>
                    <select id="platform" name="platform" class="w-full rounded-lg border-2 shadow-sm focus:ring-indigo-500">
                        <option value="">Pilih Platform</option>
                        <option value="Glints">Glints</option>
                        <option value="LinkedIn">LinkedIn</option>
                        <option value="JobStreet">JobStreet</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Input URL Job dan Tanggal Lamaran -->
                <div>
                    <label for="url_job" class="block text-sm font-medium text-gray-400 dark-text mb-1">URL Job</label>
                    <input type="url" id="url_job" name="url_job" placeholder="https://..." class="w-full rounded-lg border-2 shadow-sm focus:ring-indigo-500">
                </div>
                <div>
                    <label for="tanggal_lamaran" class="block text-sm font-medium text-gray-400 dark-text mb-1">Tanggal Lamaran</label>
                    <input type="date" id="tanggal_lamaran" name="tanggal_lamaran" class="w-full rounded-lg border-2 shadow-sm focus:ring-indigo-500">
                </div>

                <!-- Input Dokumen dan Status -->
                <div>
                    <label for="dokumen" class="block text-sm font-medium text-gray-400 dark-text mb-1">Dokumen yang digunakan</label>
                    <input type="text" id="dokumen" name="dokumen" placeholder="Nama CV, portofolio, dll" class="w-full rounded-lg border-2 shadow-sm focus:ring-indigo-500">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-400 dark-text mb-1">Status</label>
                    <select id="status" name="status" class="w-full rounded-lg border-2 shadow-sm focus:ring-indigo-500">
                        <option value="dikirim">Dikirim</option>
                        <option value="wawancara">Wawancara</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>

                <!-- Input Keterangan (span full width) -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-gray-400 dark-text mb-1">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="5" placeholder="Catatan tambahan, alasan ditolak, dll." class="w-full rounded-lg border-2 shadow-sm focus:ring-indigo-500"></textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="md:col-span-2 flex justify-end mt-4">
                    <button type="submit" class="bg-indigo-600 text-white font-semibold py-3 px-8 rounded-full shadow-md hover:bg-indigo-700 transition duration-300">
                        Tambah Lamaran
                    </button>
                </div>
            </form>
        </div>

        <!-- Bagian 2: Ringkasan -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="card p-6 rounded-3xl shadow-xl text-center border shadow-md 
            hover:-translate-y-2 hover:shadow-lg
            transition transform duration-300 cursor-pointer">
        <p class="text-sm font-medium text-gray-400 dark-text">Total Lamaran</p>
        <p class="text-4xl font-bold text-indigo-400 mt-2">{{ $total ?? 0 }}</p>
    </div>

    <div class="card p-6 rounded-3xl shadow-xl text-center border shadow-md 
            hover:-translate-y-2 hover:shadow-lg
            transition transform duration-300 cursor-pointer">
        <p class="text-sm font-medium text-gray-400 dark-text">Wawancara</p>
        <p class="text-4xl font-bold text-yellow-400 mt-2">{{ $wawancara ?? 0 }}</p>
    </div>

    <div class="card p-6 rounded-3xl shadow-xl text-center border shadow-md 
            hover:-translate-y-2 hover:shadow-lg
            transition transform duration-300 cursor-pointer">
        <p class="text-sm font-medium text-gray-400 dark-text">Diterima</p>
        <p class="text-4xl font-bold text-green-400 mt-2">{{ $diterima  ?? 0 }}</p>
    </div>

    <div class="card p-6 rounded-3xl shadow-xl text-center border shadow-md 
            hover:-translate-y-2 hover:shadow-lg
            transition transform duration-300 cursor-pointer">
        <p class="text-sm font-medium text-gray-400 dark-text">Ditolak</p>
        <p class="text-4xl font-bold text-red-400 mt-2">{{ $ditolak  ?? 0 }}</p>
    </div>
</div>

        <!-- Bagian 3: Grafik Visual -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Grafik Total Lamaran per Platform -->
            <div class="card p-6 rounded-3xl shadow-2xl border shadow-md 
            hover:-translate-y-2 hover:shadow-lg
            transition transform duration-300 cursor-pointer">
                <h3 class="text-xl font-semibold mb-4 dark-text">Total Lamaran per Platform</h3>
                <div style="height: 350px;">
                    <canvas id="platformChart"></canvas>
                </div>
            </div>
            <!-- Grafik Status Lamaran -->
            <div class="card p-6 rounded-3xl shadow-2xl border shadow-md 
            hover:-translate-y-2 hover:shadow-lg
            transition transform duration-300 cursor-pointer">
                <h3 class="text-xl font-semibold mb-4 dark-text">Status Lamaran</h3>
                <div style="height: 350px;">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Bagian 4: Detail Lamaran Kerja -->
        <div class="card p-6 md:p-8 rounded-3xl shadow-2xl border">
            <h2 class="text-2xl font-bold mb-6 dark-text">Detail Lamaran Kerja</h2>
            <!-- Tabel placeholder -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y">
                    <thead class="bg-slate-700 light-mode:bg-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark-text light-mode:text-gray-900">Posisi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark-text light-mode:text-gray-900">Platform</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark-text light-mode:text-gray-900">URL Job</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark-text light-mode:text-gray-900">Dokumen</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark-text light-mode:text-gray-900">Keterangan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark-text light-mode:text-gray-900">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark-text light-mode:text-gray-900">Tanggal Edit</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark-text light-mode:text-gray-900">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider dark-text light-mode:text-gray-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700 light-mode:divide-gray-200">
                        @foreach($lamarans as $lamaran)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark-text">{{ $lamaran->posisi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 light-mode:text-gray-600">{{ $lamaran->platform }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="{{ $lamaran->url_job }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 light-mode:text-indigo-600 light-mode:hover:text-indigo-500">Lihat</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 light-mode:text-gray-600">{{ $lamaran->dokumen }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 light-mode:text-gray-600">{{ $lamaran->keterangan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 light-mode:text-gray-600">{{ $lamaran->tanggal_lamaran }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 light-mode:text-gray-600">{{ $lamaran->updated_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $lamaran->status == 'diterima' ? 'bg-green-800 text-green-200' : ($lamaran->status == 'ditolak' ? 'bg-red-800 text-red-200' : 'bg-yellow-800 text-yellow-200') }}">
                                    {{ ucfirst($lamaran->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex space-x-2">
                                <a href="{{ route('dashboard.edit', $lamaran) }}" class="bg-indigo-600 text-white py-1 px-3 rounded-full shadow-md hover:bg-indigo-700 transition duration-300">Edit</a>
                                <form action="{{ route('dashboard.destroy', $lamaran) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lamaran ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded-full">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Div untuk notifikasi pop-up -->
    <div id="success-notification" class="fixed bottom-5 right-5 z-50 transform transition-all duration-300 ease-out translate-x-full">
        <div class="bg-emerald-500 text-white p-4 rounded-lg shadow-xl flex items-center space-x-3" >
            <!-- Ikon SVG untuk notifikasi -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span id="notification-message" class="font-semibold text-sm"></span>
        </div>
    </div>
    
    <!-- Script untuk Grafik Chart.js dan Logika Tema -->
    <script>
    // Data untuk grafik Total Lamaran per Platform
    const platformData = {
        labels: {!! json_encode(array_keys($platformStats)) !!},    // nama platform
        datasets: [{
            label: 'Total Lamaran',
            data: {!! json_encode(array_values($platformStats)) !!}, // jumlah per platform
            backgroundColor: ['#6366f1', '#f97316', '#22c55e', '#a3a3a3'],
            borderColor: 'rgba(0,0,0,0)',
            borderWidth: 2
        }]
    };

    // Data untuk grafik Status Lamaran
    const statusData = {
        labels: {!! json_encode(['Dikirim','Wawancara','Diterima','Ditolak']) !!},
        datasets: [{
            label: 'Status Lamaran',
            data: {!! json_encode([$total, $wawancara, $diterima, $ditolak]) !!},
            backgroundColor: ['#60a5fa', '#facc15', '#4ade80', '#f87171'],
            hoverOffset: 4
        }]
    };

    // Fungsi untuk mendapatkan opsi Chart.js berdasarkan tema
    function getChartOptions(isDarkMode) {
        const labelColor = isDarkMode ? '#94a3b8' : '#64748b';
        const gridColor = isDarkMode ? '#334155' : '#e2e8f0';

        return {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: {
                        color: labelColor
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        color: gridColor
                    },
                    ticks: {
                        color: labelColor
                    }
                },
                y: {
                    grid: {
                        color: gridColor
                    },
                    ticks: {
                        color: labelColor,
                        stepSize: 1
                    }
                }
            }
        };
    }

    // Inisialisasi Chart.js
    let platformChart, statusChart;

    function initCharts(isDarkMode) {
        const platformCtx = document.getElementById('platformChart').getContext('2d');
        const statusCtx = document.getElementById('statusChart').getContext('2d');

        const chartOptions = getChartOptions(isDarkMode);

        if (platformChart) platformChart.destroy();
        platformChart = new Chart(platformCtx, {
            type: 'bar',
            data: platformData,
            options: chartOptions
        });

        if (statusChart) statusChart.destroy();
        statusChart = new Chart(statusCtx, {
            type: 'doughnut',
            data: statusData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: {
                            color: chartOptions.plugins.legend.labels.color
                        }
                    }
                }
            }
        });
    }

    // Tema gelap/terang
    const themeToggle = document.getElementById('theme-toggle');
    const moonIcon = document.getElementById('moon-icon');
    const sunIcon = document.getElementById('sun-icon');

    function toggleTheme() {
        const isDarkMode = !document.body.classList.toggle('light-mode');
        localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');

        if (isDarkMode) {
            moonIcon.classList.remove('hidden');
            sunIcon.classList.add('hidden');
        } else {
            moonIcon.classList.add('hidden');
            sunIcon.classList.remove('hidden');
        }
        initCharts(isDarkMode);
    }

    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme');
        const isDarkMode = (savedTheme === 'light') ? false : true;

        if (savedTheme === 'light') {
            document.body.classList.add('light-mode');
            moonIcon.classList.add('hidden');
            sunIcon.classList.remove('hidden');
        }

        initCharts(isDarkMode);
        themeToggle.addEventListener('click', toggleTheme);

        // Notifikasi sukses
        const notification = document.getElementById('success-notification');
        const messageContainer = document.getElementById('notification-message');
        const successMessage = '{{ session('success') }}';

        if (successMessage) {
            messageContainer.textContent = successMessage;
            notification.classList.remove('translate-x-full');

            setTimeout(() => {
                notification.classList.add('translate-x-full');
            }, 5000);
        }
    });
</script>
</body>
</html>
