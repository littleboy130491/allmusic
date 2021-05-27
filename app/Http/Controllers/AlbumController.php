<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        $categories = Category::all();
        return view('dashboard.album.create', ['artists' => $artists, 'categories' => $categories]);
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
                'unique:albums',
                'max:255' 
            ],
            'released_year' => 'integer|digits:4'
        ]);
        
        $album = new Album;
        
        $album->title = $request->title;
        $album->overview = $request->overview;
        $album->released_year = $request->released_year;
        if (isset($request->image))
        {
        $file_name = $request->image->getClientOriginalName();
        $file_storage_path = $request->image->storeAs('albums', $file_name, 'public');
        //$file_full_path = asset(Storage::url($file_storage_path));
        $album->image = $file_storage_path;
        }

        $album->artist_id = $request->artist;
        $album->slug = Str::of($request->title)->slug('-');
        $album->save();
        
        $album->categories()->attach($request->categories);
        $album->save();

        return redirect('/dashboard/album')->with('status', 'Album '.$album->title.' successfully created');;
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
        $album = Album::where('slug', $id)->first();
     
        return view('pages.single.album', ['album' => $album]);
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
        $artists = Artist::all();
        $categories = Category::all();

        return view('dashboard.album.edit', [
            'album' => $album, 
            'artists' => $artists, 
            'categories' => $categories
        ]);

        
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
                Rule::unique('albums')->ignore($request->album),
                'max:255' 
            ],
            'released_year' => 'integer|digits:4'
        ]);
       
        $album = Album::find($id);
        $album->title = $request->title;
        $album->overview = $request->overview;
        $album->released_year = $request->released_year;

        if (isset($request->image))
        {
        $file_name = $request->image->getClientOriginalName();
        $file_storage_path = $request->image->storeAs('albums', $file_name, 'public');
        //$file_full_path = asset(Storage::url($file_storage_path));
        $album->image = $file_storage_path;
        }
 
        $album->artist_id = $request->artist;
        $album->slug = Str::of($request->title)->slug('-');
        $album->categories()->sync($request->categories);
        $album->save();

        return redirect('/dashboard/album')->with('status', 'Album '.$album->title.' successfully updated');
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
        $album = Album::where('id', $id)->value('title');
        Album::destroy($id);
        return redirect('/dashboard/album')->with('status', 'Album '.$album.' successfully deleted');
    }
}
