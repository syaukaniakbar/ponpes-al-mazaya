<?php

namespace App\Http\Controllers;

use App\Models\JumlahSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            ->get()
            ->sortBy(function ($item) {
                $order = ['MTS', 'MA', 'Santri Pondok'];
                return array_search($item->tingkatan, $order);
            })
            ->values();

        return response()->json($data);
    }


    public function getStudentData2()
    {
        $currentYear = date('Y');
        $startYear = $currentYear - 4; // 5 years including the current year

        $data = JumlahSiswa::select('tingkatan', 'tahun', JumlahSiswa::raw('SUM(total_siswa) as total'))
            ->whereBetween('tahun', [$startYear, $currentYear])
            ->groupBy('tingkatan', 'tahun')
            ->get();

        // Ensure the 'tingkatan' are sorted correctly
        $orderedData = $data->sortBy(function ($item) {
            $order = ['MTs', 'MA', 'Santri Pondok'];
            return array_search($item->tingkatan, $order);
        })->values();

        return response()->json($orderedData);
    }
}
