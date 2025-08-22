<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Job Application Dashboard</title>
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
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .form-input {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid #cbd5e1;
            border-radius: 1rem;
            color: #1e293b;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
            width: 100%;
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
            color: #475569;
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
            width: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #64748b;
            font-size: 0.875rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider::before {
            margin-right: 0.5rem;
        }

        .divider::after {
            margin-left: 0.5rem;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            border-color: #6366f1;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.1);
        }
    </style>
</head>
<body>
    <div class="glass-card p-8 w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="bg-indigo-600 p-3 rounded-xl shadow-lg inline-block">
                <i class="fas fa-briefcase text-white text-2xl"></i>
            </div>
            <h1 class="text-2xl font-bold mt-4">Job Application Dashboard</h1>
            <p class="text-sm text-gray-600">Buat akun untuk mulai melacak lamaran kerja Anda</p>
        </div>

        <!-- Form Register -->
        <form action="/register" method="POST">
            @csrf
            
            <div class="space-y-4">
                <!-- Email -->
                <div>
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" 
                           placeholder="sandy@sunnyte.com"
                           class="form-input" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" 
                           placeholder="Masukkan password"
                           class="form-input" required>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                           placeholder="Konfirmasi password"
                           class="form-input" required>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="btn-primary">
                        Daftar
                    </button>
                </div>
            </div>
        </form>

        <!-- Divider -->
        <div class="divider my-6">atau lanjutkan dengan</div>

        <!-- Social Login -->
        <div class="grid grid-cols-2 gap-4">
            <button class="social-btn">
                <i class="fab fa-google text-red-500 mr-2"></i>
                <span class="text-sm">Google</span>
            </button>
            <button class="social-btn">
                <i class="fab fa-linkedin text-blue-600 mr-2"></i>
                <span class="text-sm">LinkedIn</span>
            </button>
        </div>

        <!-- Login Link -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Sudah punya akun? 
                <a href="/login" class="text-indigo-600 font-semibold hover:underline">
                    Masuk di sini
                </a>
            </p>
        </div>
    </div>

    <script>
        // Validasi form
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('password_confirmation');
                
                if (password.value !== confirmPassword.value) {
                    e.preventDefault();
                    alert('Password dan konfirmasi password tidak cocok!');
                    confirmPassword.focus();
                }
            });
        });
    </script>
</body>
</html>