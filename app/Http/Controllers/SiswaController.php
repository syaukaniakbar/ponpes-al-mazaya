<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SiswaController extends Controller
{

    public function success($nisn)
    {
        // Ambil data siswa berdasarkan NISN
        $siswa = Siswa::where('nisn', $nisn)->firstOrFail();

        // Kirim data siswa ke view
        return view('pages.success', compact('siswa'));
    }


    public function create()
    {
        $pdf1Path = asset('pdf/aturan.pdf'); // Lokasi PDF 1
        $pdf2Path = asset('pdf/surat_pernyataan.pdf'); // Lokasi PDF 2
            
         // Kirim path ke view
         return view('pages.form-pendaftaran', [
             'pdf1Path' => $pdf1Path,
             'pdf2Path' => $pdf2Path,
         ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|digits:10|unique:siswa',
            'nama' => 'required|string|max:255',
            'program_pendidikan' => 'required|in:wustha,ulya,mts,ma',
            'nik' => 'required|digits:16|unique:siswa',
            'nomor_kk' => 'required|digits:16',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat_domisili' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'jumlah_saudara' => 'required|integer|min:0',
            'anak_ke' => 'required|integer|min:1',
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
            'nama_pengirim' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ], 
        
        [
            'nisn.required' => 'NISN harus diisi.',
            'nama.required' => 'Nama harus diisi.',
            'program_pendidikan.required' => 'Program pendidikan harus dipilih.',
            'nik.required' => 'NIK harus diisi.',
            'nomor_kk.required' => 'Nomor KK harus diisi.',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
            'alamat_domisili.required' => 'Alamat domisili harus diisi.',
            'provinsi.required' => 'Provinsi harus diisi.',
            'kota.required' => 'Kota harus diisi.',
            'kecamatan.required' => 'Kecamatan harus diisi.',
            'kelurahan.required' => 'Kelurahan harus diisi.',
            'jumlah_saudara.required' => 'Jumlah saudara harus diisi.',
            'anak_ke.required' => 'Anak ke harus diisi.',
            'asal_sekolah.required' => 'Asal sekolah harus diisi.',
            'nama_ayah.required' => 'Nama ayah harus diisi.',
            'nik_ayah.required' => 'NIK ayah harus diisi.',
            'pendidikan_ayah.required' => 'Pendidikan ayah harus diisi.',
            'pekerjaan_ayah.required' => 'Pekerjaan ayah harus diisi.',
            'nama_ibu.required' => 'Nama ibu harus diisi.',
            'nik_ibu.required' => 'NIK ibu harus diisi.',
            'pendidikan_ibu.required' => 'Pendidikan ibu harus diisi.',
            'pekerjaan_ibu.required' => 'Pekerjaan ibu harus diisi.',
            'penghasilan.required' => 'Penghasilan harus diisi.',
            'alamat_kk.required' => 'Alamat KK harus diisi.',
            'no_hp_orangtua.required' => 'Nomor HP orangtua harus diisi.',
            'kopiah.max' => 'Kopiah maksimal 10 karakter.',
            'seragam.max' => 'Seragam maksimal 10 karakter.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'File gambar harus dalam format jpeg, png, atau jpg.',
            'image.max' => 'Ukuran file gambar tidak boleh lebih dari 5MB.',
        ]);

        // Initialize image path
        $imagePath = null;

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            try {
                // Store image in the 'blog_images' folder
                $imagePath = $request->file('image')->store('transaction_images', 'public');
            } catch (\Exception $e) {
                // Handle errors during file upload
                return back()->with('error', 'There was an issue uploading the image.');
            }
        }

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
            'tahun' => now()->year,
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
            'nama_pengirim' => $request->nama_pengirim,
            'image_bukti_transaksi_url' => $imagePath,
        ]);
        return redirect()->route('success', ['nisn' => $data->nisn]);
    }

    public function search(Request $request)
    {
        $nisn = $request->input('nisn');

        // Misalnya mencari data siswa berdasarkan NISN
        $siswa = Siswa::where('nisn', $nisn)->first();

        if ($siswa) {
            return response()->json([
                'status' => 'success',
                'data' => $siswa,
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Siswa tidak ditemukan',
            ]);
        }
    }

    public function siswa($program_pendidikan)
    {
        $siswas = Siswa::where('program_pendidikan', $program_pendidikan)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.admin.siswa.admin-siswa', compact('siswas')); // Corrected variable name
    }

    public function edit(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('pages.admin.siswa.admin-siswa-edit', compact('siswa'));
    }

    public function update(Request $request, string $id)
{
    $request->validate([
        'nisn' => 'required|digits:10|unique:siswa,nisn,' . $id, // Allow the same NISN for the current record
        'nama' => 'required|string|max:255',
        'program_pendidikan' => 'required|in:wustha,ulya,mts,ma',
        'nik' => 'required|digits:16|unique:siswa,nik,' . $id, // Allow the same NIK for the current record
        'nomor_kk' => 'required|digits:16',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date|before:today',
        'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        'alamat_domisili' => 'required|string|max:255',
        'provinsi' => 'required|string|max:255',
        'kota' => 'required|string|max:255',
        'kecamatan' => 'required|string|max:255',
        'kelurahan' => 'required|string|max:255',
        'jumlah_saudara' => 'required|integer|min:0',
        'anak_ke' => 'required|integer|min:1',
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
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
    ],  
        
    [
        'nisn.required' => 'NISN harus diisi.',
        'nama.required' => 'Nama harus diisi.',
        'program_pendidikan.required' => 'Program pendidikan harus dipilih.',
        'nik.required' => 'NIK harus diisi.',
        'nomor_kk.required' => 'Nomor KK harus diisi.',
        'tempat_lahir.required' => 'Tempat lahir harus diisi.',
        'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
        'jenis_kelamin.required' => 'Jenis kelamin harus dipilih.',
        'alamat_domisili.required' => 'Alamat domisili harus diisi.',
        'provinsi.required' => 'Provinsi harus diisi.',
        'kota.required' => 'Kota harus diisi.',
        'kecamatan.required' => 'Kecamatan harus diisi.',
        'kelurahan.required' => 'Kelurahan harus diisi.',
        'jumlah_saudara.required' => 'Jumlah saudara harus diisi.',
        'anak_ke.required' => 'Anak ke harus diisi.',
        'asal_sekolah.required' => 'Asal sekolah harus diisi.',
        'nama_ayah.required' => 'Nama ayah harus diisi.',
        'nik_ayah.required' => 'NIK ayah harus diisi.',
        'pendidikan_ayah.required' => 'Pendidikan ayah harus diisi.',
        'pekerjaan_ayah.required' => 'Pekerjaan ayah harus diisi.',
        'nama_ibu.required' => 'Nama ibu harus diisi.',
        'nik_ibu.required' => 'NIK ibu harus diisi.',
        'pendidikan_ibu.required' => 'Pendidikan ibu harus diisi.',
        'pekerjaan_ibu.required' => 'Pekerjaan ibu harus diisi.',
        'penghasilan.required' => 'Penghasilan harus diisi.',
        'alamat_kk.required' => 'Alamat KK harus diisi.',
        'no_hp_orangtua.required' => 'Nomor HP orangtua harus diisi.',
        'kopiah.max' => 'Kopiah maksimal 10 karakter.',
        'seragam.max' => 'Seragam maksimal 10 karakter.',
        'image.image' => 'File yang diunggah harus berupa gambar.',
        'image.mimes' => 'File gambar harus dalam format jpeg, png, atau jpg.',
        'image.max' => 'Ukuran file gambar tidak boleh lebih dari 5MB.',
    ]);

    $siswa = Siswa::findOrFail($id);

    // Initialize image path
    $imagePath = $siswa->image_bukti_transaksi_url;
  
    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        try {
            // Delete the old image if it exists
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Store the new image in the 'transaction_images' folder
            $imagePath = $request->file('image')->store('transaction_images', 'public');
        } catch (\Exception $e) {
            return back()->with('error', 'There was an issue uploading the image.');
        }
    }

    $siswa->update([
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
        'image_bukti_transaksi_url' => $imagePath,
    ]);

    return redirect()->route('siswa.edit', ['id' => $siswa->id])->with('success', 'Update Siswa Berhasil');
}


    public function destroy(string $id)
    {
        // Temukan siswa berdasarkan ID
        $siswa = Siswa::find($id);

        // Jika siswa tidak ditemukan, arahkan dengan pesan error
        if (!$siswa) {
            return redirect()->route('siswa', ['program_pendidikan' => 'all']) // Ganti 'all' sesuai kebutuhan default
                ->with('error', 'Siswa tidak ditemukan.');
        }

        // Simpan nama dan program pendidikan untuk pesan redirect
        $program_pendidikan = $siswa->program_pendidikan;
        $nama = $siswa->nama;

        // Periksa dan hapus file gambar terkait, jika ada
        if ($siswa->image_bukti_transaksi_url && Storage::disk('public')->exists($siswa->image_bukti_transaksi_url)) {
            try {
                Storage::disk('public')->delete($siswa->image_bukti_transaksi_url);
            } catch (\Exception $e) {
                return redirect()->route('siswa', ['program_pendidikan' => $program_pendidikan])
                    ->with('error', 'Terjadi kesalahan saat menghapus file gambar: ' . $e->getMessage());
            }
        }

        // Hapus data siswa dari database
        $siswa->delete();

        // Redirect ke halaman siswa dengan pesan sukses
        return redirect()->route('siswa', ['program_pendidikan' => $program_pendidikan])
            ->with('success', 'Siswa ' . $nama . ' berhasil dihapus.');
    }
}
