<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.admin.blog.admin-blog', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.blog.admin-blog-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        $request->validate([
            'title' => 'required|string|max:155',
            'description' => 'required|string',
            'category' => 'required|in:umum,prestasi,ilmiah',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Initialize image path
        $imagePath = null;

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            try {
                // Store image in the 'blog_images' folder
                $imagePath = $request->file('image')->store('blog_images', 'public');
            } catch (\Exception $e) {
                // Handle errors during file upload
                return back()->with('error', 'There was an issue uploading the image.');
            }
        }

        // Create the new blog post
        Blog::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category' => $request->category,
            'image_url' => $imagePath,
        ]);

        // Redirect back with success message
        return redirect()->route('blog.create')->with('success', 'Blog Created Successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        // Return the blog details as JSON
        return response()->json([
            'title' => $blog->title,
            'description' => $blog->description,
            'category' => ucfirst($blog->category),
            'image_url' => asset('storage/' . $blog->image_url),
            'created_at' => $blog->created_at->format('d/m/Y'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.admin.blog.admin-blog-edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:155',
            'description' => 'required|string',
            'category' => 'required|in:umum,prestasi,ilmiah',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $blog = Blog::findOrFail($id);

        // Handle image upload if a new one is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($blog->image_url && \Storage::disk('public')->exists($blog->image_url)) {
                \Storage::disk('public')->delete($blog->image_url);
            }
            $blog->image_url = $request->file('image')->store('blog_images', 'public');
        }

        // Update blog data
        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'category' => $request->category,
        ]);

        return redirect()->route('blog.edit', ['id' => $blog->id])->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blog')->with('error', 'Blog not found');
        }

        // Check and delete the associated image file
        if ($blog->image_url && Storage::disk('public')->exists($blog->image_url)) {
            Storage::disk('public')->delete($blog->image_url);
        }

        $title = $blog->title;

        // Delete the blog from the database
        $blog->delete();

        return redirect()->route('blog')->with('success', 'Berhasil Menghapus ' . $title);
    }
}
