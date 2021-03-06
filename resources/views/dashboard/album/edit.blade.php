@extends('dashboard')
@section('content')

@if ($errors->any())
  <div class="bg-red-100 rounded p-4 mb-2">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form class="w-full max-w-lg" action="/dashboard/album/{{ $album->id }}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
<div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Album Title
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" name="title" value="{{ $album->title }}">
     
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Album Overview
      </label>
      <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
      id="overview" 
      name="overview"
      rows="10">
      {{ $album->overview }}</textarea>
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Album Released Year
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="released_year" type="text" name="released_year" value="{{ $album->released_year }}">
     
    </div>
  </div>


  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Album Image
      </label>
      @isset ($album->image)
      <img src="/storage/{{ $album->image }}" width="100px">
      @endisset
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="image" type="file" name="image">
     
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Artist
      </label>

      @foreach ($artists as $artist)
      <input id="{{ $artist->name }}" type="radio" name="artist" value="{{ $artist->id }}" 
        @if (@$artist->name == @$album->artist->name) checked
        @endif
       > 
      <label for="{{ $artist->name }}">{{ $artist->name }}</label><br>
      @endforeach
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Category
      </label>

      @foreach ($categories as $category)
      <input type="checkbox" id="{{ $category->name }}" name="categories[]" value="{{ $category->id }}" 
        @foreach ($album->categories as $album_category)
          @if ($album_category->name == $category->name)
          checked
          @endif
        @endforeach
      >
      <label for="{{ $category->name }}">{{ $category->name }}</label><br>
      @endforeach
    </div>
  </div>

  



  <div class="md:flex md:items-center">
    <div class="md:w-1/3">
      <button type="submit" class="shadow bg-green-600 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
        Update
      </button>
    </div>
    <div class="md:w-2/3"></div>
  </div>
</form>
@endsection