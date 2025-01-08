<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Header;
use App\Models\NavLink;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {

        $headers = Header::all();
        return view('pages.home', compact('headers'));
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
        $blogs = Blog::with('user')->orderBy('created_at', 'desc')->paginate(5);
        return view('pages.blog', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Get previous blog
        $previousBlog = Blog::where('id', '<', $blog->id)
            ->orderBy('id', 'desc')
            ->first();

        // Get next blog
        $nextBlog = Blog::where('id', '>', $blog->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('pages.blog-detail', compact('blog', 'previousBlog', 'nextBlog'));
    }

    public function navShow($slug)
    {
        $navLink = NavLink::where('slug', $slug)->firstOrFail();

        return view('pages.nav-links-detail', compact('navLink'));
    }
}
