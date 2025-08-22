<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lamaran Kerja - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
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
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
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
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-secondary {
            background: rgba(71, 85, 105, 0.5);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: rgba(71, 85, 105, 0.8);
            transform: translateY(-2px);
        }

        .form-input {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            color: #f8fafc;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            width: 100%;
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

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #94a3b8;
        }

        .light-mode .form-label {
            color: #64748b;
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

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease forwards;
        }
    </style>
</head>
<body class="min-h-screen p-4 md:p-8">
    <!-- Header dengan Logo, Tombol Kembali dan Tema -->
    <div class="dashboard-header p-6 mb-8 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <div class="bg-indigo-600 p-3 rounded-xl shadow-lg">
                <i class="fas fa-briefcase text-white text-2xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">Edit Lamaran Kerja</h1>
                <p class="text-sm opacity-75">Perbarui informasi lamaran kerja Anda</p>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <!-- Tombol untuk beralih mode gelap/terang -->
            <div class="flex items-center space-x-2">
                <i class="fas fa-sun text-yellow-400"></i>
                <div class="theme-toggle active" id="theme-toggle">
                    <i class="fas fa-sun theme-icon sun-icon"></i>
                    <i class="fas fa-moon theme-icon moon-icon"></i>
                </div>
                <i class="fas fa-moon text-indigo-400"></i>
            </div>

            <a href="{{ route('dashboard.index') }}" class="btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <!-- Container Utama -->
    <div class="max-w-4xl mx-auto">
        <div class="glass-card p-6 md:p-8">
            <h2 class="text-2xl font-bold mb-6">✏️ Edit Lamaran Kerja</h2>

            <form action="{{ route('dashboard.update', $lamaran->id) }}" method="POST" id="editForm">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Posisi -->
                    <div>
                        <label for="posisi" class="form-label">Posisi</label>
                        <input type="text" name="posisi" id="posisi" 
                               value="{{ old('posisi', $lamaran->posisi) }}"
                               placeholder="Masukkan posisi yang dilamar"
                               class="form-input" required>
                        <div class="text-red-500 text-xs mt-1 hidden" id="posisi-error"></div>
                    </div>

                    <!-- Platform -->
                    <div>
                        <label for="platform" class="form-label">Platform</label>
                        <select name="platform" id="platform" class="form-input" required>
                            <option value="">Pilih Platform</option>
                            <option value="Glints" {{ old('platform', $lamaran->platform) == 'Glints' ? 'selected' : '' }}>Glints</option>
                            <option value="LinkedIn" {{ old('platform', $lamaran->platform) == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                            <option value="JobStreet" {{ old('platform', $lamaran->platform) == 'JobStreet' ? 'selected' : '' }}>JobStreet</option>
                            <option value="Other" {{ old('platform', $lamaran->platform) == 'Other' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        <div class="text-red-500 text-xs mt-1 hidden" id="platform-error"></div>
                    </div>

                    <!-- URL Job -->
                    <div>
                        <label for="url_job" class="form-label">URL Job</label>
                        <input type="url" name="url_job" id="url_job" 
                               value="{{ old('url_job', $lamaran->url_job) }}"
                               placeholder="https://..."
                               class="form-input">
                        <div class="text-red-500 text-xs mt-1 hidden" id="url_job-error"></div>
                    </div>

                    <!-- Tanggal Lamaran -->
                    <div>
                        <label for="tanggal_lamaran" class="form-label">Tanggal Lamaran</label>
                        <input type="date" name="tanggal_lamaran" id="tanggal_lamaran" 
                               value="{{ old('tanggal_lamaran', $lamaran->tanggal_lamaran->format('Y-m-d')) }}"
                               class="form-input" required>
                        <div class="text-red-500 text-xs mt-1 hidden" id="tanggal_lamaran-error"></div>
                    </div>

                    <!-- Dokumen -->
                    <div>
                        <label for="dokumen" class="form-label">Dokumen</label>
                        <input type="text" name="dokumen" id="dokumen" 
                               value="{{ old('dokumen', $lamaran->dokumen) }}"
                               placeholder="Nama CV, portofolio, dll"
                               class="form-input">
                        <div class="text-red-500 text-xs mt-1 hidden" id="dokumen-error"></div>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-input" required>
                            <option value="dikirim" {{ old('status', $lamaran->status) == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                            <option value="wawancara" {{ old('status', $lamaran->status) == 'wawancara' ? 'selected' : '' }}>Wawancara</option>
                            <option value="diterima" {{ old('status', $lamaran->status) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="ditolak" {{ old('status', $lamaran->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        <div class="text-red-500 text-xs mt-1 hidden" id="status-error"></div>
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="mt-6">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3" placeholder="Catatan tambahan, alasan ditolak, dll."
                              class="form-input">{{ old('keterangan', $lamaran->keterangan) }}</textarea>
                    <div class="text-red-500 text-xs mt-1 hidden" id="keterangan-error"></div>
                </div>

                <!-- Tombol -->
                <div class="mt-8 flex justify-end space-x-4">
                    <a href="{{ route('dashboard.index') }}" class="btn-secondary">
                        Batal
                    </a>
                    <button type="submit" id="submitButton" class="btn-primary">
                        <i class="fas fa-save mr-2"></i> Perbarui Lamaran
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Notifikasi -->
    <div id="success-notification" class="notification">
        <div class="flex items-center">
            <i class="fas fa-check-circle text-xl mr-3"></i>
            <div>
                <p class="font-semibold">Berhasil!</p>
                <p id="notification-message" class="text-sm">Lamaran berhasil diperbarui</p>
            </div>
        </div>
    </div>

    <script>
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
            
            // Event listener untuk toggle tema
            themeToggle.addEventListener('click', function() {
                const isDark = !body.classList.contains('light-mode');
                setTheme(!isDark);
            });
            
            // Form submission handling
            const form = document.getElementById('editForm');
            const submitButton = document.getElementById('submitButton');
            
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validasi sederhana
                let isValid = true;
                const requiredFields = ['posisi', 'platform', 'tanggal_lamaran', 'status'];
                
                requiredFields.forEach(field => {
                    const input = document.getElementById(field);
                    const error = document.getElementById(`${field}-error`);
                    
                    if (!input.value.trim()) {
                        error.textContent = 'Field ini wajib diisi';
                        error.classList.remove('hidden');
                        isValid = false;
                    } else {
                        error.classList.add('hidden');
                    }
                });
                
                if (isValid) {
                    // Tampilkan loading state
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Memproses...';
                    submitButton.disabled = true;
                    
                    // Kirim form
                    setTimeout(() => {
                        form.submit();
                    }, 1000);
                }
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
    </script>
</body>
</html>