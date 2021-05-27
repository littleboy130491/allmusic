@extends('layouts.pages')

@section('title', 'Song')

@section('content')

<!--Cards Section Start -->

<div class="container px-6 md:px-32 py-24">
  <h1 class="font-bold mb-8 text-3xl">Song</h2> 
 
  
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-8 gap-x-4">
        @foreach ($songs as $song)
        <x-card-song :song="$song"/>
        @endforeach
    </div>
</div>


<!-- Cards Section Ends -->
@endsection