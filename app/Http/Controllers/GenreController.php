<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->get('keyword')){
            $genre = Genre::where('genre_title', 'LIKE', '%' . $request->get('keyword') . '%')->get();
        }else{
            $genre = Genre::all();
        }
        return view('genre.index', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'genre_title' => 'required',
            'description' => 'required',
        ]);
        Genre::create([
            'genre_title' => $request->genre_title,
            'description' => $request->description
        ]);
        return redirect()->route('genre.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(genre $genre)
    {
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(genre $genre)
    {
        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, genre $genre)
    {
        $request->vallidate([
            'genre_title' => 'required',
            'description' => 'required'
        ]);

        $genre->update([
            'genre_title' => $request->genre_title,
            'description' => $request->description
        ]);

        return redirect()->route('genre.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(genre $genre)
    {
        $genre->delete();
        return redirect()->route('genre.index');
    }
}
