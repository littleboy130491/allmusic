<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-start space-x-4">
            <div><a href="/dashboard/">Dashboard</a></div>
            <div><a href="/dashboard/artist">Artist</a></div>
            <div><a href="/dashboard/category">Category</a></div>
            <div><a href="/dashboard/song">Song</a></div>
            <div><a href="/dashboard/album">Album</a></div>
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
            @yield('content')
        </div>
        
    </div>
    

   
</x-app-layout>



