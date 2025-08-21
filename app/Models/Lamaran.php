<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    // Nama tabel (opsional, karena Laravel otomatis menggunakan nama plural model)
    protected $table = 'lamarans';

    // Kolom yang boleh diisi massal
    protected $fillable = [
        'posisi',
        'platform',
        'url_job',
        'dokumen',
        'keterangan',
        'tanggal_lamaran',
        'status',
    ];

    // Cast field ke tipe data tertentu
    protected $casts = [
        'tanggal_lamaran' => 'date', // otomatis jadi Carbon instance
    ];

    /**
     * Relasi ke User (jika ada)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
