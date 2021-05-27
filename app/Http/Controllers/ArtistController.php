<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\User;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


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
        $validated = $request->validate([
            'name' => [
                'required',
                'unique:artists',
                'max:255' 
            ]
        ]);

        $artist = new Artist;
        $artist->name = $request->name;
        $artist->overview = $request->overview;
        $artist->biography = $request->biography;
        $artist->slug = Str::of($request->name)->slug('-');


        if (isset($request->photo)) 
        {
            $file_name = $request->photo->getClientOriginalName();
            $file_storage_path = $request->photo->storeAs('artists', $file_name, 'public');
            $artist->photo = $file_storage_path;
        }
        $artist->save();
        
        return redirect('/dashboard/artist')->with('status', 'Artist '.$artist->name.' successfully created');
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
        $artist = Artist::where('slug', $id)->first();
        return view('pages.single.artist', ['artist' => $artist]);
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
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('artists')->ignore($request->artist),
                'max:255' 
            ]
        ]);

        $artist = Artist::find($id);
        $artist->name = $request->name;
        $artist->overview = $request->overview;
        $artist->biography = $request->biography;
        $artist->slug = Str::of($request->name)->slug('-');

        if (isset($request->photo)) 
        {
        $file_name = $request->photo->getClientOriginalName();
        $file_storage_path = $request->photo->storeAs('artists', $file_name, 'public');
        $artist->photo = $file_storage_path;
        ;
        }

        $artist->save();

        

        return redirect('dashboard/artist')->with('status', 'Artist '.$artist->name.' successfully updated');;
    }

     /* Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $artist = Artist::where('id', $id)->value('name');
        Artist::destroy($id);
        return redirect('dashboard/artist')->with('status', 'Artist '.$artist.' successfully deleted');;
    }
}
