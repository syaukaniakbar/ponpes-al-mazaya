<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function index()
    {
        return view('pages.admin.export.admin-export');
    }

    /**
     * Export Siswa data filtered by program_pendidikan.
     */
    public function exportExcel(Request $request)
    {
        // Validate inputs
        $request->validate([
            'tahun' => 'required|integer',
            'program_pendidikan' => 'required|in:ulya,wustha,mts,ma',
        ]);

        $tahun = $request->tahun;
        $program = $request->program_pendidikan;

        // Pass filters to the export class
        return Excel::download(new SiswaExport($tahun, $program), "siswa_{$program}_{$tahun}.xlsx");
    }
}
