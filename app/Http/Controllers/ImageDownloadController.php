<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ImageDownloadController extends Controller
{
    public function downloadImages(Request $request)
    {
        // Validate inputs
        $request->validate([
            'tahun' => 'required|integer',
            'program_pendidikan' => 'required|in:ulya,wustha,mts,ma',
        ]);

        $tahun = $request->tahun;
        $program = $request->program_pendidikan;

        // Query the siswa table to get relevant records
        $students = DB::table('siswa')
            ->where('tahun', $tahun)
            ->where('program_pendidikan', $program)
            ->pluck('image_bukti_transaksi_url'); // Get only the image paths

        if ($students->isEmpty()) {
            return back()->with('error', 'No images found for the given filters.');
        }

        // Prepare the zip file
        $zipFileName = "images_{$program}_{$tahun}.zip";
        $zipFilePath = storage_path("app/public/{$zipFileName}");

        $zip = new ZipArchive();
        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($students as $imagePath) {
                $fullPath = storage_path('app/public/' . $imagePath); // Resolve full path

                if (file_exists($fullPath)) {
                    $zip->addFile($fullPath, basename($imagePath)); // Add to zip
                }
            }
            $zip->close();
        } else {
            return back()->with('error', 'Unable to create zip file.');
        }

        // Return the zip file for download
        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }
}
