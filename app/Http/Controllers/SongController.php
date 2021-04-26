<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Artist;

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
    
        return view('dashboard.song.create');
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
        $song = new Song;
        $song->title = $request->title;
        $song->overview = $request->overview;
        $song->released_year = $request->released_year;
        $song->artist_id = Artist::where('name', $request->artist)->value('id');    
        $song->save();
        return redirect('/dashboard/song');
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
        $artist = Artist::where('id',$song->artist_id)->value('name');
        return view('dashboard.song.edit', ['song' => $song, 'artist' => $artist]);
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
        
        $song = Song::find($id);
        $song->title = $request->title;
        $song->overview = $request->overview;
        $song->released_year = $request->released_year;

        $artist_id = Artist::where('name', $request->artist)->value('id');
        $song->artist_id = $artist_id;
        $song->save();
        return redirect('/dashboard/song');
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
        Song::destroy($id);
        return redirect('/dashboard/song');
    }
}
