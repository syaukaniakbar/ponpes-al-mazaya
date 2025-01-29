<?php

namespace App\Http\Controllers;
use App\Models\Video;


use Illuminate\Http\Request;

class VideoController extends Controller
{
        public function index()
    {
        // Retrieve all videos from the 'Video' model
        $video = Video::first();

        // Pass the video data to the view
        return view('pages.admin.video-profile.admin-video-profile', compact('video'));
    }

    public function create()
    {
        return view('pages.admin.video-profile.admin-video-profile-create');
    }

    public function store(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'url' => 'required|url', // Validasi URL harus valid
        ]);

        // Ambil URL yang dikirimkan dari form
        $videoUrl = $request->input('url');
        
        // Validasi apakah URL mengarah ke YouTube
        $embedUrl = '';

        // Jika URL valid dan mengarah ke YouTube
        if (strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false) {
            // Ekstrak video ID dari URL YouTube
            preg_match('/(?:https?:\/\/(?:www\.)?(?:youtube\.com\/(?:[^\/]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([^"&?\/\s]{11}))/i', $videoUrl, $matches);
            
            // Jika video ID ditemukan, buat URL embed YouTube
            if (!empty($matches[1])) {
                $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                $videoUrl = $embedUrl; // Ganti URL dengan embed URL
            } else {
                return back()->withErrors(['url' => 'Invalid YouTube URL.']);
            }
        }

        // Cek apakah video dengan URL yang sama sudah ada di database
        $existingVideo = Video::where('url', $videoUrl)->first();

        if ($existingVideo) {
            return back()->withErrors(['url' => 'This video URL already exists in the database.']);
        }

        // Simpan data video baru ke database (hanya satu kolom 'url')
        Video::create([
            'url' => $videoUrl, // Menyimpan embed URL atau URL asli yang sudah diproses
        ]);

        // Redirect ke halaman dengan URL embed yang baru disimpan
        return redirect()->route('video.create')->with('success', 'Video URL has been successfully saved!');
    }


    public function edit($id)
    {
        $url = Video::findOrFail($id);
        return view('pages.admin.video-profile.admin-video-profile-edit', compact('url'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input dari request
        $request->validate([
            'url' => 'required|url', // Validasi URL harus valid
        ]);

        // Ambil URL yang dikirimkan dari form
        $videoUrl = $request->input('url');
        
        // Validasi apakah URL mengarah ke YouTube
        $embedUrl = '';

        // Jika URL valid dan mengarah ke YouTube
        if (strpos($videoUrl, 'youtube.com') !== false || strpos($videoUrl, 'youtu.be') !== false) {
            // Ekstrak video ID dari URL YouTube
            preg_match('/(?:https?:\/\/(?:www\.)?(?:youtube\.com\/(?:[^\/]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([^"&?\/\s]{11}))/i', $videoUrl, $matches);
            
            // Jika video ID ditemukan, buat URL embed YouTube
            if (!empty($matches[1])) {
                $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                $videoUrl = $embedUrl; // Ganti URL dengan embed URL
            } else {
                return back()->withErrors(['url' => 'Invalid YouTube URL.']);
            }
        }

        // Temukan video berdasarkan ID
        $video = Video::find($id);

        if (!$video) {
            return back()->withErrors(['url' => 'Video not found.']);
        }

        // Update video URL
        $video->url = $videoUrl;
        $video->save();

        // Redirect ke halaman dengan URL embed yang baru disimpan
        return redirect()->route('video.edit', $id)->with('success', 'Video URL berhasil diperbaharui!');

    }


    public function destroy($id)
{
    // Cari video berdasarkan ID
    $video = Video::findOrFail($id);

    // Hapus video
    $video->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('video')->with('success', 'Video URL has been successfully deleted!');
}

    

}
