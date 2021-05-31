@extends('layouts.pages')

@section('title')
{{ $album->title }}
@endsection
@section('content')
<div class="px-4 md:px-12 py-4">
    <div class="container block md:flex py-8 md:space-x-8">
        <div class="w-full md:w-1/3 h-80 bg-gray-200">
            <img class="rounded-lg object-cover w-full h-full" src="/storage/{{ $album->image }}" alt="{{ $album->title }}">
        </div>
        <div class="">
            <h1 class="font-bold text-3xl mt-4 md:mt-0">{{ $album->title }}</h1>
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
        <div class="flex space-x-2 flex-nowrap">
            <div class="flex-50 md:flex-20">
                    <div class="image mb-4 h-60 w-full">
                        <a href="/artist/{{ $album->artist->slug }}">
                            <img 
                                class="rounded-lg mb-4 object-cover h-full w-full" 
                                src="/storage/{{ $album->artist->photo }}" 
                                alt="{{ $album->artist->name }}">
                        </a>
                            <p>{{ $album->artist->name }}</p>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection