<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export()
    {
        $fileName = 'siswa_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new SiswaExport, $fileName);
    }
}
