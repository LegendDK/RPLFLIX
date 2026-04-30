<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $genre = Genre::all();
        if($request->get('keyword')){
            $content = Content::where('title', 'LIKE', '%' . $request->get('keyword') . '%')->get();
        }elseif($request->get('genre')){
            $content = Content::where('genre_id',$request->get('genre'))->get();
        }else{
            $content = Content::all();
        }
        return view('dashboard.member', compact('content','genre'));
    }
}
