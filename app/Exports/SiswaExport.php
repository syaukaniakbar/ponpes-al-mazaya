<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class SiswaExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromQuery, WithMapping, WithHeadings, WithCustomValueBinder
{
    protected $programPendidikan;

    public function __construct(string $programPendidikan)
    {
        $this->programPendidikan = $programPendidikan;
    }

    public function query()
    {
        return Siswa::query()
            ->where('program_pendidikan', $this->programPendidikan);
    }

    public function map($siswa): array
    {
        return [
            (string) $siswa->nisn,
            $siswa->nama,
            $siswa->program_pendidikan,
            (string) $siswa->nik,
            (string) $siswa->nomor_kk,
            $siswa->tempat_lahir,
            $siswa->tanggal_lahir,
            $siswa->jenis_kelamin,
            $siswa->alamat_domisili,
            $siswa->provinsi,
            $siswa->kota,
            $siswa->kecamatan,
            $siswa->kelurahan,
            $siswa->jumlah_saudara,
            $siswa->anak_ke,
            $siswa->asal_sekolah,
            $siswa->nama_ayah,
            (string) $siswa->nik_ayah,
            $siswa->pendidikan_ayah,
            $siswa->pekerjaan_ayah,
            $siswa->nama_ibu,
            (string) $siswa->nik_ibu,
            $siswa->pendidikan_ibu,
            $siswa->pekerjaan_ibu,
            $siswa->penghasilan,
            $siswa->alamat_kk,
            $siswa->no_hp_orangtua,
            $siswa->kopiah,
            $siswa->seragam,
            $siswa->nama_pengirim,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT, // NISN
            'D' => NumberFormat::FORMAT_TEXT, // NIK
            'E' => NumberFormat::FORMAT_TEXT, // Nomor KK
            'R' => NumberFormat::FORMAT_TEXT, // NIK Ayah
            'V' => NumberFormat::FORMAT_TEXT, // NIK Ibu
        ];
    }

    public function headings(): array
    {
        return [
            'NISN',
            'Nama',
            'Program Pendidikan',
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
