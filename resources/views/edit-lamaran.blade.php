@extends('layouts.app')

@section('title', 'Edit Lamaran')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 p-4 md:p-8">

    <!-- Header dengan tombol kembali -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-gray-200">Edit Lamaran Kerja</h1>
        <a href="{{ route('dashboard.index') }}"
           class="inline-block bg-gray-500 text-white font-semibold py-2 px-6 rounded-full shadow hover:bg-gray-600 transition duration-300">
            Kembali
        </a>
    </div>

    <!-- Card Form -->
    <div class="bg-white dark:bg-gray-800 p-6 md:p-8 rounded-3xl shadow-xl border border-gray-200 dark:border-gray-700 max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-gray-700 dark:text-gray-100">Form Edit Lamaran</h2>

        <form action="{{ route('dashboard.update', $lamaran) }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
            @csrf
            @method('PUT')

            <!-- Posisi -->
            <div>
                <label for="posisi" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Posisi</label>
                <input type="text" id="posisi" name="posisi"
                       value="{{ old('posisi', $lamaran->posisi) }}"
                       class="w-full rounded-lg border-2 border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
            </div>

            <!-- Platform -->
            <div>
                <label for="platform" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Platform</label>
                <select id="platform" name="platform" class="w-full rounded-lg border-2 border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                    @foreach(['Glints','LinkedIn','JobStreet','Other'] as $plat)
                        <option value="{{ $plat }}" {{ old('platform', $lamaran->platform) == $plat ? 'selected' : '' }}>
                            {{ $plat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- URL Job -->
            <div>
                <label for="url_job" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">URL Job</label>
                <input type="url" id="url_job" name="url_job"
                       value="{{ old('url_job', $lamaran->url_job) }}"
                       class="w-full rounded-lg border-2 border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
            </div>

            <!-- Tanggal Lamaran -->
            <div>
                <label for="tanggal_lamaran" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Tanggal Lamaran</label>
                <input type="date" id="tanggal_lamaran" name="tanggal_lamaran"
                       value="{{ old('tanggal_lamaran', $lamaran->tanggal_lamaran->format('Y-m-d')) }}"
                       class="w-full rounded-lg border-2 border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
            </div>

            <!-- Dokumen -->
            <div>
                <label for="dokumen" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Dokumen</label>
                <input type="text" id="dokumen" name="dokumen"
                       value="{{ old('dokumen', $lamaran->dokumen) }}"
                       class="w-full rounded-lg border-2 border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Status</label>
                <select id="status" name="status" class="w-full rounded-lg border-2 border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">
                    @foreach(['dikirim','wawancara','diterima','ditolak'] as $st)
                        <option value="{{ $st }}" {{ old('status', $lamaran->status) == $st ? 'selected' : '' }}>
                            {{ ucfirst($st) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Keterangan -->
            <div class="md:col-span-2">
                <label for="keterangan" class="block text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Keterangan</label>
                <textarea id="keterangan" name="keterangan" rows="4"
                          class="w-full rounded-lg border-2 border-gray-300 dark:border-gray-600 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-3 py-2">{{ old('keterangan', $lamaran->keterangan) }}</textarea>
            </div>

            <!-- Tombol Submit -->
            <div class="md:col-span-2 flex justify-end mt-4 space-x-3">
                <button type="submit" class="bg-indigo-600 text-white font-semibold py-3 px-8 rounded-full shadow hover:bg-indigo-700 transition duration-300">
                    Perbarui Lamaran
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
