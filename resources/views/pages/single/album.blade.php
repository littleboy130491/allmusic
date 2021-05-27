@extends('layouts.pages')

@section('title')
{{ $album->title }}
@endsection
@section('content')
<div class="px-12 py-4">
    <div class="container flex py-8 space-x-8">
        <div>
            <img class="rounded-lg" src="/storage/{{ $album->image }}" alt="{{ $album->title }}">
        </div>
        <div>
        <h1 class="font-bold text-3xl">{{ $album->title }}</h1>
        <p>{{ $album->released_year }}</p>
        <p>
        @foreach($album->categories as $album_category)
            {{ $album_category->name }}
        @endforeach
        </p>
        <h2 class="font-bold mt-4">Overview</h2>
        <p>{{ $album->overview }}</p>
       
        </div>
    </div>

    <div class="container py-8">
        <h2 class="font-bold mb-2">Song List</h2>
        <ul>
            @foreach($album->songs as $album_song)
            <li>
                <a href="/song/{{ $album_song->slug }}">
                {{ $album_song->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="container py-8">
        <h2 class="font-bold mb-2">Artist</h2>
        <a href="/artist/{{ $album->artist->slug }}">
            <img class="rounded-lg mb-4" src="/storage/{{ $album->artist->photo }}" 
            alt="{{ $album->artist->name }}">
        </a>
            <p>{{ $album->artist->name }}</p>
        
    </div>
</div>

@endsection