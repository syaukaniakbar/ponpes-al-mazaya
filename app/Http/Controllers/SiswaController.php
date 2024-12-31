<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;


class SiswaController extends Controller
{

    public function create()
    {
        return view('pages.form-pendaftaran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|digits:10|unique:siswa', // Pastikan hanya angka, panjang 10
            'nama' => 'required|string|max:255',
            'program_pendidikan' => 'required|in:pondok,mts,ma',
            'nik' => 'required|digits:16|unique:siswa', // Pastikan hanya angka, panjang 16
            'nomor_kk' => 'required|digits:16', // Hanya angka, panjang 16
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today', // Tidak boleh di masa depan
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat_domisili' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'jumlah_saudara' => 'required|integer|min:0', // Saudara tidak boleh negatif
            'anak_ke' => 'required|integer|min:1', // Anak pertama minimal 1
            'asal_sekolah' => 'required|string|max:255',
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|digits:16',
            'pendidikan_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|digits:16',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan' => 'required|string|max:255',
            'alamat_kk' => 'required|string|max:255',
            'no_hp_orangtua' => 'required|string', 
            'kopiah' => 'nullable|string|max:10',
            'seragam' => 'nullable|string|max:10',
        ]);

        $data = Siswa::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp_orangtua' => $request->no_hp_orangtua,
            'program_pendidikan' => $request->program_pendidikan,
            'nomor_kk' => $request->nomor_kk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat_domisili' => $request->alamat_domisili,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'jumlah_saudara' => $request->jumlah_saudara,
            'anak_ke' => $request->anak_ke,
            'asal_sekolah' => $request->asal_sekolah,
            'nama_ayah' => $request->nama_ayah,
            'nik_ayah' => $request->nik_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nama_ibu' => $request->nama_ibu,
            'nik_ibu' => $request->nik_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'penghasilan' => $request->penghasilan,
            'alamat_kk' => $request->alamat_kk,
            'kopiah' => $request->kopiah,
            'seragam' => $request->seragam,
        ]);
        return redirect()->route('pendaftaran')->with('success', 'Pendaftaran Berhasil');
    }
}
