<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements WithCustomValueBinder, FromCollection, WithHeadings
{
    protected $tahun;
    protected $program;

    public function __construct($tahun, $program)
    {
        $this->tahun = $tahun;
        $this->program = $program;
    }

    public function collection()
    {
        return Siswa::where('tahun', $this->tahun)
            ->where('program_pendidikan', $this->program)
            ->select([
                'nisn',
                'nama',
                'program_pendidikan',
                'tahun',
                'nik',
                'nomor_kk',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'alamat_domisili',
                'provinsi',
                'kota',
                'kecamatan',
                'kelurahan',
                'jumlah_saudara',
                'anak_ke',
                'asal_sekolah',
                'nama_ayah',
                'nik_ayah',
                'pendidikan_ayah',
                'pekerjaan_ayah',
                'nama_ibu',
                'nik_ibu',
                'pendidikan_ibu',
                'pekerjaan_ibu',
                'penghasilan',
                'alamat_kk',
                'no_hp_orangtua',
                'kopiah',
                'seragam',
                'nama_pengirim'
            ])
            ->get();
    }

    public function headings(): array
    {
        return [
            'NISN',
            'Nama',
            'Program Pendidikan',
            'Tahun',
            'NIK',
            'Nomor KK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Alamat Domisili',
            'Provinsi',
            'Kota',
            'Kecamatan',
            'Kelurahan',
            'Jumlah Saudara',
            'Anak Ke',
            'Asal Sekolah',
            'Nama Ayah',
            'NIK Ayah',
            'Pendidikan Ayah',
            'Pekerjaan Ayah',
            'Nama Ibu',
            'NIK Ibu',
            'Pendidikan Ibu',
            'Pekerjaan Ibu',
            'Penghasilan',
            'Alamat KK',
            'No HP Orangtua',
            'Kopiah',
            'Seragam',
            'Nama Pengirim',
        ];
    }
}
