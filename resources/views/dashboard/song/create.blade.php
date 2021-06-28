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

<form class="w-full max-w-lg" action="/dashboard/song" method="post">
@csrf
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Song Title
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text" name="title" value="{{ old('title') }}">
     
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Song Overview
      </label>
      <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
      rows="10"
      id="overview" 
      name="overview">
      {{ old('overview') }}
      </textarea>
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Song Released Year
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="released_year" type="text" name="released_year" value="{{ old('released_year') }}">
     
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          Artist
      </label>
      @foreach ($artists as $artist)
      <input type="radio" id="{{ $artist->name }}" name="artist" value="{{ $artist->id }}"
      @if (old('artist') == $artist->id)
        checked
      @endif
      >
      <label for="{{ $artist->name }}">{{ $artist->name }}</label><br>
      @endforeach
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          Songwriter
      </label>
      @foreach ($artists as $artist)
      <input type="radio" id="{{ $artist->name }}" name="songwriter" value="{{ $artist->id }}"
      @if (old('songwriter') == $artist->id)
        checked
      @endif
      >
      <label for="{{ $artist->name }}">{{ $artist->name }}</label><br>
      @endforeach
    </div>
  </div>

  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
          Album
      </label>
      @foreach ($albums as $album)
      <input type="checkbox" id="{{ $album->title }}" name="albums[]" value="{{ $album->id }}"
          @if (old('albums'))
            @foreach (old('albums') as $old_album)
              @if ($old_album == $album->id)
              checked
              @endif
            @endforeach
          @endif
      >
      <label for="{{ $album->title }}">{{ $album->title }}</label><br>
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
          @if (old('categories'))
            @foreach (old('categories') as $old_category)
              @if ($old_category == $category->id)
              checked
              @endif
            @endforeach
          @endif
      >
      <label for="{{ $category->name }}">{{ $category->name }}</label><br>
      @endforeach
    </div>
  </div>


  <div class="md:flex md:items-center">
    <div class="md:w-1/3">
      <button type="submit" class="shadow bg-green-600 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
        Create
      </button>
    </div>
    <div class="md:w-2/3"></div>
  </div>
</form>
@endsection