<?php
namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $music = Music::all();
        return view('music.index', compact('music'));
    }

    public function create()
    {
        return view('music.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file|mimes:mp3|max:10240', // 10 MB Max
        ]);

        // Upload the file
        $filePath = $request->file('file')->store('music');

        // Save the music
        Music::create([
            'title' => $request->title,
            'album' => $request->album,
            'artist' => $request->artist,
            'price' => $request->price,
            'file_path' => $filePath,
        ]);

        return redirect()->route('music.index')->with('success', 'Music uploaded successfully!');
    }
}
