<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Music;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = auth()->user()->playlists;
        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlists.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        
        auth()->user()->playlists()->create(['name' => $request->name]);

        return redirect()->route('playlists.index')->with('success', 'Playlist created successfully!');
    }

    public function show(Playlist $playlist)
    {
        $this->authorize('view', $playlist); // Ensure only the owner can view

        $music = $playlist->music;
        return view('playlists.show', compact('playlist', 'music'));
    }

    public function addMusic(Request $request, Playlist $playlist)
    {
        $this->authorize('update', $playlist); // Ensure only the owner can modify

        $request->validate(['music_id' => 'required|exists:music,id']);
        $playlist->music()->attach($request->music_id);

        return redirect()->route('playlists.show', $playlist)->with('success', 'Song added to playlist!');
    }
}
