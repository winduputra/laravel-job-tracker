@extends('layouts.dashboard')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">✏️ Edit Lamaran Kerja</h2>
            <a href="{{ route('dashboard.index') }}" 
               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
               Kembali
            </a>
        </div>

        <form action="{{ route('dashboard.update', $lamaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Posisi -->
                <div>
                    <label for="posisi" class="block text-sm font-semibold text-gray-700">Posisi</label>
                    <input type="text" name="posisi" id="posisi" 
                           value="{{ old('posisi', $lamaran->posisi) }}"
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <!-- Platform -->
                <div>
                    <label for="platform" class="block text-sm font-semibold text-gray-700">Platform</label>
                    <select name="platform" id="platform"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="LinkedIn" {{ $lamaran->platform == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                        <option value="Jobstreet" {{ $lamaran->platform == 'Jobstreet' ? 'selected' : '' }}>Jobstreet</option>
                        <option value="Indeed" {{ $lamaran->platform == 'Indeed' ? 'selected' : '' }}>Indeed</option>
                        <option value="Glassdoor" {{ $lamaran->platform == 'Glassdoor' ? 'selected' : '' }}>Glassdoor</option>
                        <option value="Lainnya" {{ $lamaran->platform == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- URL Job -->
                <div>
                    <label for="url" class="block text-sm font-semibold text-gray-700">URL Job</label>
                    <input type="url" name="url" id="url" 
                           value="{{ old('url', $lamaran->url) }}"
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Tanggal Lamaran -->
                <div>
                    <label for="tanggal_lamaran" class="block text-sm font-semibold text-gray-700">Tanggal Lamaran</label>
                    <input type="date" name="tanggal_lamaran" id="tanggal_lamaran" 
                           value="{{ old('tanggal_lamaran', $lamaran->tanggal_lamaran) }}"
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>

                <!-- Dokumen -->
                <div>
                    <label for="dokumen" class="block text-sm font-semibold text-gray-700">Dokumen</label>
                    <input type="text" name="dokumen" id="dokumen" 
                           value="{{ old('dokumen', $lamaran->dokumen) }}"
                           class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-semibold text-gray-700">Status</label>
                    <select name="status" id="status"
                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        <option value="Dikirim" {{ $lamaran->status == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                        <option value="Wawancara" {{ $lamaran->status == 'Wawancara' ? 'selected' : '' }}>Wawancara</option>
                        <option value="Diterima" {{ $lamaran->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                        <option value="Ditolak" {{ $lamaran->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="mt-6">
                <label for="keterangan" class="block text-sm font-semibold text-gray-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('keterangan', $lamaran->keterangan) }}</textarea>
            </div>

            <!-- Tombol -->
            <div class="mt-6 flex justify-end">
                <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
                    Perbarui Lamaran
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
