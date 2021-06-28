@extends('dashboard')
@section('content')

 <!--Container-->
 <div class="container mt-6">
        @if (session('status'))
        <div class="container bg-blue-600 text-white rounded p-4 mb-6">
        {{ session('status')}}
        </div>     	
        @endif
        <a class="shadow bg-green-600 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="/dashboard/song/create">Create New Song</a>
    
      		 
               
               <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-6 rounded shadow bg-white">
                
                  
                   <table class="stripe hover text-left" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Song Title</th>
                               <th>Song Overview</th>
                               <th>Song Released Year</th>
                               <th>Artist</th>
                               <th>Songwriter</th>
                               <th>Category</th>
                               <th>Action</th>
                            </tr>
                       </thead>
                       <tbody>
                       @foreach($songs as $song)
                           <tr class="h-12">
                               <td>{{ $loop->iteration}}</td>
                               <td>{{ $song->title }}</td>
                               <td>{{ $song->overview }}</td>
                               <td>{{ $song->released_year }}</td>
                               <td>
                                    <a href="/dashboard/artist/{{ @$song->artist->id }}/edit">
                                        {{ @$song->artist->name }}
                                    </a>
                               </td>
                               <td>
                                    <a href="/dashboard/artist/{{ $song->songwriter_id }}/edit">
                                        {{ @$song->songwriter->name }}
                                    </a>
                               </td>
                               <td>
                                    @foreach ($song->categories as $song_category)
                                    <a href="/dashboard/category/{{ @$song_category->id }}/edit">
                                        {{ @$song_category->name }}
                                    </a>
                                     @endforeach
                               </td>

                               <td>
                                <a class="shadow bg-green-600 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="/dashboard/song/{{ $song->id }}/edit">Edit
                                </a>
                                <form action="/dashboard/song/{{ $song->id }}" method="post" class="inline">
                                    @csrf
                                    @method('delete')                
                                    <button type="submit" class="shadow bg-red-600 hover:bg-red-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mx-2"> 
                                    Delete
                                    </button>
                                </form>
                               </td>
                           </tr>
                        @endforeach   
                         
                       </tbody>
                       
                   </table>
                   
                   
               </div>
               <!--/Card-->
   
   
         </div>
         <!--/container-->
@endsection