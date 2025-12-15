<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::latest()->paginate(10);
        return view('songs.index', compact('songs'));
    }

    public function create()
    {
        return view('songs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'album' => 'nullable|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'release_date' => 'nullable|date',
            'lyrics' => 'nullable|string',
            'cover_image' => 'nullable|url',
        ]);

        Song::create($validated);

        return redirect()->route('songs.index')->with('success', 'Пісня успішно додана!');
    }

    public function show(Song $song)
    {
        return view('songs.show', compact('song'));
    }

    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'album' => 'nullable|string|max:255',
            'genre' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'release_date' => 'nullable|date',
            'lyrics' => 'nullable|string',
            'cover_image' => 'nullable|url',
        ]);

        $song->update($validated);

        return redirect()->route('songs.index')->with('success', 'Пісня успішно оновлена!');
    }

    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.index')->with('success', 'Пісня успішно видалена!');
    }
}
