<?php

namespace App\Http\Controllers;

use App\Models\JumlahSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ChartController extends Controller
{
    public function getStudentData(Request $request)
    {
        $year = $request->query('year', date('Y')); // Default to the current year if no year is provided

        // Query using the Eloquent model
        $data = JumlahSiswa::select('tingkatan', DB::raw('SUM(total_siswa) as total'))
            ->where('tahun', $year)
            ->groupBy('tingkatan')
            ->get();

        Log::info($data);

        return response()->json($data);
    }


    public function getTeacherDataFromExcel(Request $request)
    {
        $year = $request->query('year', date('Y')); // Default to the current year if no year is provided

        // Load Excel data
        $data = Excel::toArray(null, public_path('excel/teacher.xlsx'))[0];

        // Process the data
        $processedData = collect($data)->skip(1) // Skip the header row
            ->filter(fn($row) => $row[2] == $year) // Filter by year (assuming Year is column B)
            ->groupBy(fn($row) => $row[1]) // Group by Degree (assuming Degree is column A)
            ->map(fn($group) => $group->sum(fn($row) => $row[3])) // Sum Total Students
            ->map(fn($total, $degree) => ['degree' => $degree, 'total' => $total])
            ->values();

        return response()->json($processedData);
    }
}
