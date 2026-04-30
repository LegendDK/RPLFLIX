<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = Content::all();
        return view('content.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::all();
        return view('content.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'release_date' => 'required',
            'age_rating' => 'required',
            'cover' => 'required|file|mimes:jpeg,png,jpg',
            'file' => 'required|file|mimes:mp4, avi, mov, wmv|max:204800'
        ]);

        $cover = $request->file('cover');
        $namaCover = "cover_".time().".".$cover->getClientOriginalExtension();
        $dirCover = 'uploaded/cover';
        $cover->move($dirCover, $namaCover);

        $file = $request->file('file');
        $namaFile = "file_".time().".".$file->getClientOriginalExtension();
        $dirFile = 'uploaded/file';
        $file->move($dirFile, $namaFile);

        Content::create([
            'title' => $request->title,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'file' => $namaFile,
            'duration' => $request->duration,
            'cover' => $namaCover,
            'release_date' => $request->release_date,
            'age_rating' => $request->age_rating
        ]);
        return redirect()->route('content.index')->with('Succses');
    } 

    /**
     * Display the specified resource.
     */
    public function show(content $content)
    {
        return view('content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(content $content)
    {
        $genre = Genre::all();
        return view('content.edit', compact('content', 'genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, content $content)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'release_date' => 'required',
            'age_rating' => 'required',
            'cover' => 'file|mimes:jpeg,png,jpg',
            'file' => 'file|mimes:mp4, avi, mov, wmv|max:204800'
        ]);

        if($request->hasFile('cover')){
            $cover = $request->file('cover');
            $namaCover = "cover_".time().".".$cover->getClientOriginalExtension();
            $dirCover = 'uploaded/cover';
            $cover->move($dirCover, $namaCover);

            if(File::exists($dirCover.$content->cover)){
                File::delete($dirCover.$content->cover);
            }
        }

        if($request->hasFile('file')){
            $file = $request->file('file');
            $namaFile = "file_".time().".".$file->getClientOriginalExtension();
            $dirFile = 'uploaded/file';
            $file->move($dirFile, $namaFile);

            if(File::exists($dirFile.$content->file)){
                File::delete($dirFile.$content->file);
            }
        }

        $content->update([
            'title' => $request->title,
            'genre_id' => $request->genre_id,
            'description' => $request->description,
            'duration' => $request->duration,
            'release_date' => $request->release_date,
            'age_rating' => $request->age_rating
        ]);
        return redirect()->route('content.index')->with('Succses');      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(content $content)
    {
        $content->delete();
        return redirect()->route('content.index')->with('Succses');
    }
}
