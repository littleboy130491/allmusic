<div>

    <input 
        type="search" 
        class="bg-purple-white shadow rounded border-0 p-3" 
        placeholder="Search here.."
        wire:model="searchTerm">


    @if (strlen($searchTerm) >= 3)
    <div class="bg-white absolute min-w-full p-2 space-y-2">
        @if ($results->isNotEmpty())
            @foreach($results as $result)
            <div class="flex space-x-2">
                <div>
                    <img class="w-20" src="/storage/{{ $result->photo }} " alt="{{ $result->name }}">
                </div>
                <div>
                    <h2 class="font-bold">{{ $result->name }}</h3>
                    <p>{{ $result->overview }}</p>
                </div>
            </div>        
            @endforeach
        @else No Result Found.
        @endif
    </div>
    @endif
</div>


