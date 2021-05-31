<div class="card-wrapper flex-50 md:flex-33 lg:flex-20 p-2">  
   <div class="image bg-gray-200 h-80 w-full">
      <a href="/album/{{ $album->slug }}">
         <img 
         class="w-48 rounded-lg object-cover w-full h-80"
         src="
            @if (isset($album->image))
            /storage/{{ $album->image }}"
            @else /storage/1024px-No_image_available.svg.png"
            @endif
         alt="{{ $album->title }}" 
         >
      </a>
   </div>

   <div class="content container pt-4">
          
      <p class="italic bg-blue-900 text-white rounded inline px-2 py-1"> 
         @if ($album->categories->isNotEmpty())
            @foreach ($album->categories as $album_category)
               {{ $album_category->name }}
            @endforeach
         @else
         Uncategorized
         @endif
      </p>
      <a href="/album/{{ $album->slug }}" class="font-bold mt-2 block">{{ $album->title }}</a>
      <a href="/artist/{{ $album->artist->slug }}" class="block italic">by {{ $album->artist->name }}</a>
      <p>{{ $album->released_year }}</p>
 
   </div>
</div>
