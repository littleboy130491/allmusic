<div class="card-wrapper flex-50 md:flex-33 lg:flex-25 p-2">  
   <div class="image bg-gray-200 h-80 w-full">
      <a href="/song/{{ $song->slug }}">
         <img 
         class="w-48 rounded-lg object-cover w-full h-80"
         src="
            @if (isset($song->albums->first()->image))
            /storage/{{ $song->albums->first()->image }}"
            @else /storage/1024px-No_image_available.svg.png"
            @endif
         alt="{{ $song->title }}" 
         >
      </a>
   </div>

   <div class="content container pt-4">
          
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
