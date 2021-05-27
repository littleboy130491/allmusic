@extends('layouts.pages')

@section('title')
{{ $artist->name }}
@endsection
@section('content')
<div class="px-12 py-4">
    <div class="container flex py-8 space-x-8">
        <div>
            <img class="rounded-lg" src="/storage/{{ $artist->photo }}" alt="{{ $artist->name }}">
        </div>
        <div>
        <h1 class="font-bold text-3xl">{{ $artist->name }}</h1>
    
        <h2 class="font-bold mt-4">Overview</h2>
        <p>{{ $artist->overview }}</p>
       
        </div>
    </div>

    <div class="container py-8">
        <h2 class="font-bold mb-2">Biography</h2>
        <p>{{ $artist->biography }}</p>
    </div>

    <div class="container py-8">
        <h2 class="font-bold mb-2">Song</h2>
        <ul>
            @foreach($artist->songs as $artist_song)
            <li>
                <a href="/song/{{ $artist_song->slug }}">
                {{ $artist_song->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="container py-8">
        <h2 class="font-bold mb-2">Album</h2>
        <div class="flex space-x-4">
            @foreach ($artist->albums as $artist_album)
            <div>
            <a href="/album/{{ $artist_album->slug }}">
                <img class="rounded-lg mb-4" src="/storage/{{ $artist_album->image }}" 
                alt="{{ $artist_album->title }}">
            </a>
                <p>{{ $artist_album->title }}</p>
                <p>{{ @$artist_album->released_year }}</p>
            </div>
            @endforeach
        </div>
        
    </div>
</div>

@endsection