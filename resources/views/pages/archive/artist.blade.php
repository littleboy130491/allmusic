@extends('layouts.pages')

@section('title', 'Artist Archive')
@section('content')

<!--Cards Section Start -->

<div class="container px-6 md:px-32 py-24">
  <h1 class="font-bold mb-8 text-3xl">Artist</h1> 
 
  
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-8 gap-x-4">
        @foreach ($artists as $artist)
        <div class="">  

            <a href="/artist/{{ $artist->slug }}">
            <img src="
                @if (isset($artist->photo))
                /storage/{{ $artist->photo }}"
                @else /storage/1024px-No_image_available.svg.png"
                @endif
            alt="{{ $artist->name }}" 
            class="w-48 rounded-lg">
            </a>
            <h2 class="font-bold mt-2">{{ $artist->name }}</h2>
        </div>
        @endforeach
    </div>

</div>

@endsection