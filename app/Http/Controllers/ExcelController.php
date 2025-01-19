<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**
     * Export Siswa data filtered by program_pendidikan.
     */
    public function exportByProgramPendidikan($programPendidikan)
    {
        $fileName = 'siswa_' . $programPendidikan . '_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new SiswaExport($programPendidikan), $fileName);
    }
}
