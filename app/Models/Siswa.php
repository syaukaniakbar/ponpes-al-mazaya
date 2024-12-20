<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'name',
        'status_pendaftaran',
        'program_pendidikan',
        'NISN',
        'NIK',
        'nomor_kk',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'jumlah_saudara',
        'anak_ke',
        'sekolah_asal',
        'ayah_kandung',
        'nik_wali'
    ];

    public function wali()
    {
        return $this->belongsTo(Wali::class, 'wali_id');
    }

    use HasFactory;
}
