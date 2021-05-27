<div class="">  

   <a href="/song/{{ $song->slug }}">
      <img src="
         @if (isset($song->albums->first()->image))
         /storage/{{ $song->albums->first()->image }}"
         @else /storage/1024px-No_image_available.svg.png"
         @endif
      alt="{{ $song->title }}" 
      class="w-48 rounded-lg">
   </a>
   <div class="container pt-4">
          
      <p class="italic bg-blue-900 text-white rounded inline px-2 py-1"> 
      @if ($song->categories->isNotEmpty())
         @foreach ($song->categories as $song_category)
            {{ $song_category->name }}
         @endforeach
      @else
      Uncategorized
      @endif
      </p>
      <a href="/song/{{ $song->slug }}" class="font-bold mt-2 block">{{ $song->title }}</a>

      <a href="/artist/{{ @$song->artist->slug }}" class="block italic">by {{ @$song->artist->name }}</a>
   
      <p>{{ @$song->albums->first()->released_year }}</p>
 
   </div>
</div>
