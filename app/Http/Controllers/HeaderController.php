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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string|max:155',
            'description' => 'required|string',
        ]);

        // Initialize image path
        $imagePath = null;

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            try {
                // Store image in the 'blog_images' folder
                $imagePath = $request->file('image')->store('header_images', 'public');
            } catch (\Exception $e) {
                // Handle errors during file upload
                return back()->with('error', 'There was an issue uploading the image.');
            }
        }

        // Create the new blog post
        Header::create([
            'image_url' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Redirect back with success message
        return redirect()->route('header.create')->with('success', 'Banner Created Successfully');
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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

        // Update blog data
        $header->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('header.edit', ['id' => $header->id])->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $header = Header::find($id);

        if (!$header) {
            return redirect()->route('blog')->with('error', 'Blog not found');
        }

        // Check and delete the associated image file
        if ($header->image_url && Storage::disk('public')->exists($header->image_url)) {
            Storage::disk('public')->delete($header->image_url);
        }

        $title = $header->title;

        // Delete the blog from the database
        $header->delete();

        return redirect()->route('blog')->with('success', 'Berhasil Menghapus ' . $title);
    }
}
