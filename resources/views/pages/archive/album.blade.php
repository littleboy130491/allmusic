@extends('layouts.pages')

@section('title', 'Album')

@section('content')

<!--Cards Section Start -->

<div class="container px-4 md:px-12 py-24">
  <h1 class="font-bold mb-8 text-3xl">Album</h2> 
 
  
    <div class="flex flex-wrap w-full">
        @foreach ($albums as $album)
        <x-card-album :album="$album"/>
        @endforeach
    </div>
</div>


<!-- Cards Section Ends -->
@endsection