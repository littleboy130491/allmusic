@extends('layouts.pages')

@section('title', 'Artist Archive')
@section('content')

<!--Cards Section Start -->

<div class="container px-6 lg:px-32 md:px-12 py-24">
  <h1 class="font-bold mb-8 text-3xl">Artist</h1> 
 
  
    <div class="flex flex-wrap w-full">
        @foreach ($artists as $artist)
        <div class="card-wrapper flex-50 md:flex-33 lg:flex-25 p-2 mb-8">  
            <div class="image bg-gray-200 h-80 w-full">

                <a href="/artist/{{ $artist->slug }}">
                <img 
                class="w-48 rounded-lg object-cover w-full h-full"
                src="
                    @if (isset($artist->photo))
                    /storage/{{ $artist->photo }}"
                    @else /storage/1024px-No_image_available.svg.png"
                    @endif
                alt="{{ $artist->name }}" 
                >
                </a>
            </div>

            <div class="content container pt-4">
                <h2 class="font-bold mt-2">{{ $artist->name }}</h2>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection