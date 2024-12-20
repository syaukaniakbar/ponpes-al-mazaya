<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:155',
            'description' => 'required|string',
            'category' => 'required|in:umum,prestasi,ilmiah',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
        } 

        $data = Siswa::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'image_url' => $imagePath,
        ]);
        return redirect()->route('blog.create')->with('success', 'Blog Created Successfully');
    }
}
