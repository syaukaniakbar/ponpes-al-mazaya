<?php

namespace App\Http\Controllers;

use App\Models\JumlahSiswa;
use Illuminate\Http\Request;

class TotalSiswaController extends Controller
{
    public function index()
    {
        $navLinks = JumlahSiswa::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.total-siswa.admin-total-siswa', compact('navLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.total-siswa.admin-total-siswa-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tingkatan' => 'required|string|max:155',
            'tahun' => 'required|integer',
            'total_siswa' => 'required|integer',
        ]);

        JumlahSiswa::create([
            'tingkatan' => $request->tingkatan,
            'tahun' => $request->tahun,
            'total_siswa' => $request->total_siswa,
        ]);

        return redirect()->route('total-siswa.create')->with('success', 'Jumlah Siswa Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $navLink = JumlahSiswa::findOrFail($id);

        // Return the nav link details as JSON
        return response()->json([
            'tingkatan' => $navLink->tingkatan,
            'tahun' => $navLink->tahun,
            'total_siswa' => $navLink->total_siswa,
            'created_at' => $navLink->created_at->format('d/m/Y'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $navLink = JumlahSiswa::findOrFail($id);
        return view('
        pages.admin.total-siswa.admin-total-siswa-edit', compact('navLink'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tingkatan' => 'required|string|max:155',
            'tahun' => 'required|integer',
            'total_siswa' => 'required|integer',
        ]);

        $navLink = JumlahSiswa::findOrFail($id);

        // Update nav link data
        $navLink->update([
            'tingkatan' => $request->tingkatan,
            'tahun' => $request->tahun,
            'total_siswa' => $request->total_siswa,
        ]);

        return redirect()->route('total-siswa.edit', ['id' => $navLink->id])->with('success', 'Jumlah Siswa updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $navLink = JumlahSiswa::find($id);

        if (!$navLink) {
            return redirect()->route('total-siswa')->with('error', 'Nav Link not found');
        }

        $tingkatan = $navLink->tingkatan;
        $tahun = $navLink->tahun;

        // Delete the nav link from the database
        $navLink->delete();

        return redirect()->route('total-siswa')->with('success', 'Successfully deleted ' . $tingkatan . ' ' . $tahun);
    }
}
