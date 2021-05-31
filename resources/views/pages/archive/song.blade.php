@extends('layouts.pages')

@section('title', 'Song')

@section('content')

<!--Cards Section Start -->

<div class="container px-6 lg:px-32 md:px-12 py-24">
  <h1 class="font-bold mb-8 text-3xl">Song</h2> 
 
  
    <div class="flex flex-wrap w-full">
        @foreach ($songs as $song)
        <x-card-song :song="$song"/>
        @endforeach
    </div>
</div>


<!-- Cards Section Ends -->
@endsection