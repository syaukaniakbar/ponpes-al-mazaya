<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Video;
use App\Models\Header;
use App\Models\NavLink;
use App\Models\TeacherStaff;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()

{   
    $teacherStaffs = TeacherStaff::all();
    $headers = Header::all();
    $blogs = Blog::with('user')->orderBy('created_at', 'desc')->paginate(3); 
    
    // Retrieve all URLs from the 'url' column
    $urls = Video::pluck('url');

    // Initialize an empty embed URL
    $embedUrl = '';

    // Check if there is at least one URL in the database
    if ($urls->isNotEmpty()) {
        // Get the first URL
        $videoUrl = $urls[0];

        // Check if the URL is a valid YouTube URL
        if (strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false) {
            // Extract the video ID from the URL
            preg_match('/(?:https?:\/\/(?:www\.)?(?:youtube\.com\/(?:[^\/]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([^"&?\/\s]{11}))/i', $videoUrl, $matches);

            // If a video ID is found, construct the embed URL
            if (!empty($matches[1])) {
                $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
            }
        }
    }

    // Kirim data ke view
    return view('pages.home', compact('headers', 'blogs','embedUrl', 'teacherStaffs'));
}


    public function cek_status()
    {
        return view('pages.cek_status');
    }

    public function about_us()
    {
        return view('pages.about-us');
    }

    public function blog()
    {
        $blogs = Blog::with('user')->orderBy('created_at', 'desc')->paginate(9);
        return view('pages.blog', compact('blogs'));
    }

    public function category($category)
    {
        $blogs = Blog::where('category', $category)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
    
        return view('pages.blog', compact('blogs')); // Corrected variable name
    }
    
    public function show($slug)
    {
        $blogs = Blog::with('user')->orderBy('created_at', 'desc')->paginate(3); 

        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Get previous blog
        $previousBlog = Blog::where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        // Get next blog
        $nextBlog = Blog::where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.blog-detail', compact('blog', 'previousBlog', 'nextBlog', 'blogs'));
    }

    public function navShow($slug)
    {
        $navLink = NavLink::where('slug', $slug)->firstOrFail();

        return view('pages.nav-links-detail', compact('navLink'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        // Lakukan pencarian berdasarkan judul atau deskripsi
        $blogs = Blog::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->take(10)
            ->get();

        // Return data sebagai JSON
        return response()->json($blogs);
    }

}
