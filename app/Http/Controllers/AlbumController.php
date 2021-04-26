<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $albums = Album::all();
        
        return view('dashboard.album.display', ['albums' => $albums]);
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
        return view('dashboard.album.create', ['artists' => $artists]);
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
        $album = new Album;
        $album->title = $request->title;
        $album->overview = $request->overview;
        $album->released_year = $request->released_year;
        if (isset($request->image))
        {
        $file_name = $request->image->getClientOriginalName();
        $file_storage_path = $request->image->storeAs('albums', $file_name, 'public');
        $file_full_path = asset(Storage::url($file_storage_path));
        $album->image = $file_full_path;
        }

        $artist_id = Artist::where('name', $request->artist)->value('id');
        $album->artist_id = $artist_id;

        $album->save();

        return redirect('/dashboard/album');
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
        $album = Album::find($id);
        return view('dashboard.album.edit', ['album' => $album]);
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
        $album = Album::find($id);
        $album->title = $request->title;
        $album->overview = $request->overview;
        $album->released_year = $request->released_year;

        if (isset($request->image))
        {
        $file_name = $request->image->getClientOriginalName();
        $file_storage_path = $request->image->storeAs('albums', $file_name, 'public');
        $file_full_path = asset(Storage::url($file_storage_path));
        $album->image = $file_full_path;
        }

        $artist_id = Artist::where('name', $request->artist)->value('id');

        $album->artist_id = $artist_id;
       
        $album->save();

        return redirect('/dashboard/album');
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
        Album::destroy($id);
        return redirect('/dashboard/album');
    }
}
