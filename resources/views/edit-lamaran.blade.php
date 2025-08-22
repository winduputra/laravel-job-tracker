@extends('layouts.app')

@section('title', 'Edit Lamaran')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <!-- Logo -->
                <div class="w-12 h-12 rounded-xl bg-white dark:bg-gray-800 flex items-center justify-center shadow-md">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-8 w-auto">
                </div>

                <div>
                    <h1 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-gray-100">Edit Lamaran Kerja</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Perbarui informasi lamaran Anda dengan cepat.</p>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <!-- Theme Toggle -->
                <button id="themeToggle" type="button" aria-label="Toggle theme"
                        class="inline-flex items-center justify-center gap-2 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-100 px-3 py-2 rounded-full shadow-sm hover:shadow-md transition">
                    <!-- Sun (light) -->
                    <svg id="iconSun" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.36 6.36l-1.42-1.42M7.05 7.05L5.64 5.64m12.72 0l-1.41 1.41M7.05 16.95l-1.41 1.41M12 8a4 4 0 100 8 4 4 0 000-8z"/>
                    </svg>
                    <!-- Moon (dark) -->
                    <svg id="iconMoon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                    </svg>
                </button>

                <a href="{{ route('dashboard.index') }}" class="inline-flex items-center gap-2 bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-700 dark:text-gray-100 px-4 py-2 rounded-full shadow-sm hover:shadow-md transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Card -->
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-3xl shadow-lg overflow-hidden">
            <div class="px-6 py-5 md:px-8 md:py-6 bg-gradient-to-r from-white to-indigo-50 dark:from-gray-800 dark:to-gray-900">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg md:text-xl font-semibold text-gray-700 dark:text-gray-100">Form Edit Lamaran</h2>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Periksa kembali sebelum menyimpan</div>
                </div>
            </div>

            <form action="{{ route('dashboard.update', $lamaran->id) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 md:p-8">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="md:col-span-2 bg-red-50 border border-red-100 text-red-700 px-4 py-3 rounded-lg">
                        <strong class="block mb-1">Terjadi kesalahan:</strong>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Posisi -->
                <div>
                    <label for="posisi" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Posisi</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14v7" />
                            </svg>
                        </span>
                        <input type="text" id="posisi" name="posisi"
                            value="{{ old('posisi', $lamaran->posisi) }}"
                            placeholder="Contoh: Frontend Developer"
                            class="w-full pl-12 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-100 shadow-sm focus:ring-indigo-400 focus:border-indigo-400 transition px-4 py-3">
                    </div>
                    @error('posisi') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Platform -->
                <div>
                    <label for="platform" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Platform</label>
                    <select id="platform" name="platform" class="w-full rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-100 shadow-sm focus:ring-indigo-400 focus:border-indigo-400 px-4 py-3">
                        @foreach(['Glints','LinkedIn','JobStreet','Other'] as $plat)
                            <option value="{{ $plat }}" {{ old('platform', $lamaran->platform) == $plat ? 'selected' : '' }}>
                                {{ $plat }}
                            </option>
                        @endforeach
                    </select>
                    <p class="text-xs text-gray-400 mt-1">Sumber lowongan pekerjaan.</p>
                    @error('platform') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- URL Job -->
                <div class="md:col-span-2">
                    <label for="url_job" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">URL Job</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14L21 3m0 0v7m0-7h-7M14 10a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </span>
                        <input type="url" id="url_job" name="url_job"
                            value="{{ old('url_job', $lamaran->url_job) }}"
                            placeholder="https://example.com/job/123"
                            class="w-full pl-12 rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-100 shadow-sm focus:ring-indigo-400 focus:border-indigo-400 transition px-4 py-3">
                    </div>
                    @error('url_job') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Tanggal Lamaran -->
                <div>
                    <label for="tanggal_lamaran" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Tanggal Lamaran</label>
                    <input type="date" id="tanggal_lamaran" name="tanggal_lamaran"
                        value="{{ old('tanggal_lamaran', $lamaran->tanggal_lamaran ? \Illuminate\Support\Carbon::parse($lamaran->tanggal_lamaran)->format('Y-m-d') : '') }}"
                        class="w-full rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-100 shadow-sm focus:ring-indigo-400 focus:border-indigo-400 px-4 py-3">
                    @error('tanggal_lamaran') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Dokumen -->
                <div>
                    <label for="dokumen" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Dokumen</label>
                    <input type="text" id="dokumen" name="dokumen"
                        value="{{ old('dokumen', $lamaran->dokumen) }}"
                        placeholder="Nama file atau link (CV, portfolio)"
                        class="w-full rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-100 shadow-sm focus:ring-indigo-400 focus:border-indigo-400 px-4 py-3">
                    <p class="text-xs text-gray-400 mt-1">Contoh: CV_NamaSaya.pdf atau https://drive.google.com/...</p>
                    @error('dokumen') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Status</label>
                    <select id="status" name="status" class="w-full rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-100 shadow-sm focus:ring-indigo-400 focus:border-indigo-400 px-4 py-3">
                        @foreach(['dikirim','wawancara','diterima','ditolak'] as $st)
                            <option value="{{ $st }}" {{ old('status', $lamaran->status) == $st ? 'selected' : '' }}>
                                {{ ucfirst($st) }}
                            </option>
                        @endforeach
                    </select>
                    @error('status') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="5"
                        class="w-full rounded-xl border-2 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-100 shadow-sm focus:ring-indigo-400 focus:border-indigo-400 px-4 py-3">{{ old('keterangan', $lamaran->keterangan) }}</textarea>
                    @error('keterangan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <!-- Preview status + submit -->
                <div class="md:col-span-2 flex flex-col md:flex-row items-center justify-between gap-4 mt-2">
                    <div class="flex items-center gap-3">
                        @php
                            $statusColors = [
                                'dikirim' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                                'wawancara' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                                'diterima' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                                'ditolak' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                            ];
                            $curStatus = old('status', $lamaran->status);
                            $badgeClass = $statusColors[$curStatus] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-100';
                        @endphp

                        <span class="px-3 py-2 rounded-full text-sm font-medium {{ $badgeClass }}">
                            {{ ucfirst($curStatus ?? '—') }}
                        </span>

                        @if(optional($lamaran->updated_at))
                            <span class="text-xs text-gray-400 dark:text-gray-300">Terakhir diperbarui {{ $lamaran->updated_at->diffForHumans() }}</span>
                        @endif
                    </div>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('dashboard.index') }}" class="text-sm text-gray-600 dark:text-gray-200 px-4 py-2 rounded-full border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">Batal</a>
                        <button type="submit" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-3 rounded-full shadow-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Perbarui Lamaran
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Theme toggle script (keeps state in localStorage and respects system preference) -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const html = document.documentElement;
    const btn = document.getElementById('themeToggle');
    const iconSun = document.getElementById('iconSun');
    const iconMoon = document.getElementById('iconMoon');

    function showIcons() {
        if (html.classList.contains('dark')) {
            iconMoon.classList.remove('hidden');
            iconSun.classList.add('hidden');
        } else {
            iconSun.classList.remove('hidden');
            iconMoon.classList.add('hidden');
        }
    }

    function setTheme(theme) {
        if (theme === 'dark') {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        }
        showIcons();
    }

    // initialize
    const stored = localStorage.getItem('theme');
    if (stored) {
        setTheme(stored);
    } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        setTheme('dark');
    } else {
        setTheme('light');
    }

    btn.addEventListener('click', function() {
        setTheme(document.documentElement.classList.contains('dark') ? 'light' : 'dark');
    });
});
</script>
@endsection
