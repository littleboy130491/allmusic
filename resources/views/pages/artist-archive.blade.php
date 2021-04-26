@extends('layouts.pages')

@section('title', 'Artist Archive')
@section('content')

@foreach ($songs as $song)
{{ $song->title }} |
@endforeach

@endsection