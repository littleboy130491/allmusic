@extends('layouts.pages')

@section('title')
{{ $song->title }}
@endsection
@section('content')
<div class="px-4 md:px-12 py-4">
    <div class="container block md:flex py-8 md:space-x-8">
        <div class="w-full md:w-1/3 h-80 bg-gray-200">
            <img class="rounded-lg object-cover w-full h-full" src="/storage/{{ $song->albums->first()->image }}" 
            alt="{{ $song->albums->first()->title }}">
        </div>
        <div>
            <h1 class="font-bold text-3xl mt-4 md:mt-0">{{ $song->title }}</h1>
            <p>{{ $song->released_year }}</p>
            <p>
            @foreach($song->categories as $song_category)
                {{ $song_category->name }}
            @endforeach
            </p>
            <h2 class="font-bold mt-4">Overview</h2>
        <p>{{ $song->overview }}</p>
       
        </div>
    </div>

    <div class="container py-8">
        <h2 class="font-bold mb-2">Album</h2>
        <ul>
            @foreach($song->albums as $song_album)
            <li>
                <a href="/album/{{ $song_album->slug }}">
                {{ $song_album->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="container py-8">
        <h2 class="font-bold mb-2">Artist</h2>
        <div class="flex space-x-2 flex-nowrap">
            <div class="flex-50 md:flex-20">
                    <div class="image mb-4 h-60 w-full">
                        <a href="/artist/{{ $song->artist->slug }}">
                            <img class="rounded-lg mb-4" src="/storage/{{ $song->artist->photo }}" 
                            alt="{{ $song->artist->name }}">
                        </a>
                            <p>{{ $song->artist->name }}</p>
                    </div>
            </div>
        </div>
                        
    </div>
</div>

@endsection