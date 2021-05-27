<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Category;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $songs = Song::all();
        return view('dashboard.song.display', ['songs' => $songs]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    
    {
        //
        $artists = Artist::all();
        $albums = Album::all();
        $categories = Category::all();
        return view('dashboard.song.create', 
            ['artists' => $artists, 
            'albums' => $albums,
            'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => [
                'required',
                'unique:songs',
                'max:255' 
            ],
            'released_year' => 'integer|digits:4'
        ]);
        
        $song = new Song;
        $song->title = $request->title;
        $song->overview = $request->overview;
        $song->released_year = $request->released_year;
        $song->artist_id = $request->artist;   
        $song->slug = Str::of($request->title)->slug('-'); 
        $song->save();
        
        $song->albums()->attach($request->albums);
        $song->categories()->attach($request->categories);
        $song->save();
        return redirect('/dashboard/song')->with('status', 'Song '.$song->title.' successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $song = Song::where('slug', $id)->first();
        return view('pages.single.song', ['song'=>$song]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $song = Song::find($id);
        $artists = Artist::all();
        $albums = Album:: all();
        $categories = Category:: all();
        return view('dashboard.song.edit', [
            'song' => $song, 
            'artists' => $artists, 
            'albums' => $albums,
            'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    
        $validated = $request->validate([
            'title' => [
                'required',
                Rule::unique('songs')->ignore($request->song),
                'max:255' 
            ],
            'released_year' => 'integer|digits:4'
        ]);
        
        $song = Song::find($id);
        $song->title = $request->title;
        $song->overview = $request->overview;
        $song->released_year = $request->released_year;
        $song->artist_id = $request->artist;
        $song->slug = Str::of($request->title)->slug('-'); 

        $song->albums()->sync($request->albums);
        $song->categories()->sync($request->categories);
        $song->save();
        return redirect('/dashboard/song')->with('status', 'Song '.$song->title.' successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $song = Song::where('id', $id)->value('title');
        Song::destroy($id);
        return redirect('/dashboard/song')->with('status', 'Song '.$song. ' successfully deleted');
    }
}
