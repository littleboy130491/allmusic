@extends('layouts.pages')

@section('title', 'Musik Indonesia')
@section('content')

<x-jumbotron/>

<!--Cards Section Start -->

<div class="container px-6 md:px-32 py-24">
  <h2 class="font-bold mb-8">Featured Albums</h2> 
 
  
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-8 gap-x-4">
        @foreach ($albums as $album)
        <x-card-album :album="$album"/>
        @endforeach
    </div>
</div>


<!-- Cards Section Ends -->


@endsection