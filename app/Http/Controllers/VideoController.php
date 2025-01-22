<?php

namespace App\Http\Controllers;
use App\Models\Video;


use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        // Retrieve all URLs from the 'url' column
        $urls = Video::pluck('url');
        $id = Video::get()->pluck('id');
        $id = $id[0];
    
        // Initialize an empty embed URL
        $embedUrl = '';
        $videoUrl = ''; // Menyimpan URL asli

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
            } else {
                // Jika URL bukan YouTube, tetap simpan URL asli
                $embedUrl = $videoUrl; // Menyimpan URL asli jika bukan YouTube
            }
        }

        // Pass the embed URL and original URL to the view
        return view('pages.admin.video-profile.admin-video-profile', compact('embedUrl', 'videoUrl', 'id'));
    }

    public function edit($id)
    {
        $url = Video::findOrFail($id);
        return view('pages.admin.video-profile.admin-video-profile-edit', compact('url'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming URL
        $request->validate([
            'url' => 'required|url', // Ensure the URL is valid
        ]);

        // Find the video by ID
        $video = Video::findOrFail($id);

        // Update the URL
        $video->url = $request->input('url');
        $video->save(); // Save the changes

        // Redirect to the video profile page with a success message
        return redirect()->route('video')->with('success', 'Video URL updated successfully!');
    }

    

}
