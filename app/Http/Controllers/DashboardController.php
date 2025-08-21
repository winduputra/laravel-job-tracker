<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lamaran;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard dengan semua lamaran dan statistik
     */
    public function index()
    {
        // Ambil semua lamaran terbaru
        $lamarans = Lamaran::orderBy('created_at', 'desc')->get();

        // Ringkasan statistik
        $total      = $lamarans->count();
        $wawancara  = $lamarans->where('status', 'wawancara')->count();
        $diterima   = $lamarans->where('status', 'diterima')->count();
        $ditolak    = $lamarans->where('status', 'ditolak')->count();

        // Statistik per platform (pastikan key sensitif huruf kecil/kapital sesuai database)
        $platformStats = [
            'Glints'    => $lamarans->where('platform', 'Glints')->count(),
            'LinkedIn'  => $lamarans->where('platform', 'LinkedIn')->count(),
            'JobStreet' => $lamarans->where('platform', 'JobStreet')->count(),
            'Other'     => $lamarans->where('platform', 'Other')->count(),
        ];

        // Statistik per status (lebih rapi)
        $statusStats = collect(['dikirim','wawancara','diterima','ditolak'])->mapWithKeys(function($status) use ($lamarans) {
            return [$status => $lamarans->where('status', $status)->count()];
        });

        return view('dashboard', [
            'lamarans'      => $lamarans,
            'total'         => $total,
            'wawancara'     => $wawancara,
            'diterima'      => $diterima,
            'ditolak'       => $ditolak,
            'platformStats' => $platformStats,
            'statusStats'   => $statusStats,
        ]);
    }

    /**
     * Simpan lamaran baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'posisi'          => 'required|string|max:255',
            'platform'        => 'required|string|max:50',
            'url_job'         => 'required|url|max:255',
            'dokumen'         => 'required|string|max:255',
            'keterangan'      => 'nullable|string',
            'tanggal_lamaran' => 'required|date',
            'status'          => 'required|in:dikirim,wawancara,diterima,ditolak',
        ]);

        Lamaran::create($validated);

        // Redirect ke dashboard.index
        return redirect()->route('dashboard.index')->with('success', 'Lamaran berhasil ditambahkan!');
    }

    /**
     * Form edit lamaran
     */
    public function edit(Lamaran $lamaran)
    {
        return view('edit-lamaran', compact('lamaran'));
    }

    /**
     * Update lamaran
     */
    public function update(Request $request, Lamaran $lamaran)
    {
        $validated = $request->validate([
            'posisi'          => 'required|string|max:255',
            'platform'        => 'required|string|max:50',
            'url_job'         => 'required|url|max:255',
            'dokumen'         => 'required|string|max:255',
            'keterangan'      => 'nullable|string',
            'tanggal_lamaran' => 'required|date',
            'status'          => 'required|in:dikirim,wawancara,diterima,ditolak',
        ]);

        $lamaran->update($validated);

        // Redirect ke dashboard.index
        return redirect()->route('dashboard.index')->with('success', 'Lamaran berhasil diperbarui!');
    }

    /**
     * Hapus lamaran
     */
    public function destroy(Lamaran $lamaran)
    {
        $lamaran->delete();

        // Redirect ke dashboard.index
        return redirect()->route('dashboard.index')->with('success', 'Lamaran berhasil dihapus!');
    }
}
