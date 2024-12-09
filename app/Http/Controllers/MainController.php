<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function pendaftaran()
    {
        return view('pages.form-pendaftaran');
    }

    public function blog()
    {
        $blogs = Blog::with('user')->paginate(5);
        return view('pages.blog', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('pages.blog-detail', compact('blog'));
    }
}
