<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;


class DocumentController extends Controller
{
    public function index()
    {   
        $documents = Document::all();  // Ambil semua dokumen
        return view('pages.admin.document.admin-document', compact('documents'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.document.admin-document-create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:aturan,surat_pernyataan',
            'document' => 'required|mimes:pdf|max:5120'
        ]);

        $existingDocument = Document::where('type', $request->type)->first();
        if ($existingDocument) {
            return back()->withErrors(['type' => 'Dokumen dengan jenis ini sudah ada.']);
        }

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = 'uploads/' . $fileName;
            $file->move(public_path('uploads'), $fileName);

            Document::create([
                'name' => $request->name,
                'type' => $request->type,
                'path' => $filePath,
            ]);

            return back()->with('success', 'Dokumen berhasil diunggah!');
        }

        return back()->withErrors(['document' => 'Gagal mengunggah dokumen.']);
    }

    public function destroy($id)
    {
        // Cari dokumen berdasarkan ID
        $document = Document::findOrFail($id);

        // Hapus file dari server
        if (file_exists(public_path($document->path))) {
            unlink(public_path($document->path));  // Menghapus file yang telah diupload
        }

        // Hapus data dokumen dari database
        $document->delete();

        return back()->with('success', 'Dokumen berhasil dihapus!');
    }
}
