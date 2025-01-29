<?php

namespace App\Http\Controllers;
use App\Models\Header;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    public function index()
    {
        $headers = Header::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.admin.header.admin-header', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.header.admin-header-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'label' => 'required|string|max:155',
            'nama_tombol_aksi' => 'required|string|max:155',
            'url_aksi' => 'required|string|max:155',
            'title' => 'required|string|max:155',
            'description' => 'required|string',
        ],
        [
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'File gambar harus dalam format jpeg, png, atau jpg.',
            'image.max' => 'Ukuran file gambar tidak boleh lebih dari 5MB.',
            
            'label.required' => 'Label harus diisi.',
            'label.string' => 'Label harus berupa teks.',
            'label.max' => 'Label tidak boleh lebih dari 155 karakter.',
            
            'nama_tombol_aksi.required' => 'Nama tombol aksi harus diisi.',
            'nama_tombol_aksi.string' => 'Nama tombol aksi harus berupa teks.',
            'nama_tombol_aksi.max' => 'Nama tombol aksi tidak boleh lebih dari 155 karakter.',
            
            'url_aksi.required' => 'URL aksi harus diisi.',
            'url_aksi.string' => 'URL aksi harus berupa teks.',
            'url_aksi.max' => 'URL aksi tidak boleh lebih dari 155 karakter.',
            
            'title.required' => 'Title harus diisi.',
            'title.string' => 'Title harus berupa teks.',
            'title.max' => 'Title tidak boleh lebih dari 155 karakter.',
            
            'description.required' => 'Deskripsi harus diisi.',
            'description.string' => 'Deskripsi harus berupa teks.',
        ]);

        // Initialize image path
        $imagePath = null;

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            try {
                // Store image in the 'header_images' folder
                $imagePath = $request->file('image')->store('header_images', 'public');
            } catch (\Exception $e) {
                // Handle errors during file upload
                return back()->with('error', 'Terjadi masalah saat mengunggah gambar.');
            }
        }

        // Create the new header post
        Header::create([
            'image_url' => $imagePath,
            'label' => $request->label,
            'nama_tombol_aksi' => $request->nama_tombol_aksi,
            'url_aksi' => $request->url_aksi,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Redirect back with success message
        return redirect()->route('header.create')->with('success', 'Pembuatan Banner Berhasil');
    }

    public function edit(string $id)
    {
        $header = Header::findOrFail($id);
        return view('pages.admin.header.admin-header-edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'label' => 'required|string|max:155',
            'tombol_aksi' => 'required|string|max:155',
            'url_aksi' => 'required|string|max:155',
            'title' => 'required|string|max:155',
            'description' => 'required|string',
        ]);

        $header = Header::findOrFail($id);

        // Handle image upload if a new one is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($header->image_url && \Storage::disk('public')->exists($header->image_url)) {
                \Storage::disk('public')->delete($header->image_url);
            }
            $header->image_url = $request->file('image')->store('header_images', 'public');
        }

        // Update header data
        $header->update([
            'label' => $request->label,
            'tombol_aksi' => $request->tombol_aksi,
            'url_aksi' => $request->url_aksi,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('header.edit', ['id' => $header->id])->with('success', 'Pembaharuan Banner Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $header = Header::find($id);

        if (!$header) {
            return redirect()->route('header')->with('error', 'Header not found');
        }

        // Check and delete the associated image file
        if ($header->image_url && Storage::disk('public')->exists($header->image_url)) {
            Storage::disk('public')->delete($header->image_url);
        }

        $title = $header->title;

        // Delete the header from the database
        $header->delete();

        return redirect()->route('header')->with('success', 'Berhasil Menghapus ' . $title);
    }
}
