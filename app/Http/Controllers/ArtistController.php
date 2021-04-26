<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\User;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;


class ArtistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $artists = Artist::all();
        return view('dashboard.artist.display', ['artists' => $artists]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.artist.create');
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
        $request->validate([
            'name' => 'required'
        ]);

        $artist = new Artist;
        $artist->name = $request->name;
        $artist->overview = $request->overview;
        $artist->biography = $request->biography;


        if (isset($request->photo)) 
        {
            $file_name = $request->photo->getClientOriginalName();
            $file_storage_path = $request->photo->storeAs('artists', $file_name, 'public');
            $file_full_path = asset(Storage::url($file_storage_path));

            $artist->photo = $file_full_path;
        }
        $artist->save();
        
        return redirect('/dashboard/artist');
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
        $songs = Artist::find($id)->songs;
        return view('pages.artist-archive', ['songs' => $songs]);
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
        $artist = Artist::find($id);
        return view('dashboard.artist.edit', ['artist' => $artist]);
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
        $artist = Artist::find($id);
        $artist->name = $request->name;
        $artist->overview = $request->overview;
        $artist->biography = $request->biography;

        if (isset($request->photo)) 
        {
        $file_name = $request->photo->getClientOriginalName();
        $file_storage_path = $request->photo->storeAs('artists', $file_name, 'public');
        
        $file_full_path = asset(Storage::url($file_storage_path));
        $artist->photo = $file_full_path;
        }

        $artist->save();

        

        return redirect('dashboard/artist');
    }

     /* Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Artist::destroy($id);
        return redirect('dashboard/artist');
    }
}
