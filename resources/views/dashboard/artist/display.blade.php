@extends('dashboard')
@section('content')

 <!--Container-->
 <div class="container mt-6">
 <a href="/dashboard/artist/create">Create New Artist</a>
    
      		 
               
               <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                
                  
                   <table class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Artist Name</th>
                               <th>Artist Overview</th>
                               <th>Artist Biography</th>
                               <th>Artist Photo</th>
                               <th>Song</th>
                               <th>Album</th>
                           
                               <th>Action</th>
                            </tr>
                       </thead>
                       <tbody>
                       @foreach($artists as $artist)
                           <tr>
                               <td>{{ $loop->index + 1 }}</td>
                               <td>{{ $artist->name }}</td>
                               <td>{{ $artist->overview }}</td>
                               <td>{{ $artist->biography }}</td>
                               <td>
                                    @if (isset ($artist->photo))
                                        <img src="{{ $artist->photo }}" width="100px">
                                        @else
                                        <img src="/storage/1024px-No_image_available.svg.png" width="100px">
                                    @endif
                               </td>
                               <td>
                                    @foreach ($artist->songs as $song)
                                            {{ $song->title }}
                                    @endforeach
                               </td>
                               <td>
                                    @foreach ($artist->albums as $album)
                                            {{ $album->title }}
                                    @endforeach
                               </td>
                    
                               
                               <td>
                                <a href="/dashboard/artist/{{ $artist->id }}/edit">Edit
                                </a> / 
                                <form action="/dashboard/artist/{{ $artist->id }}" method="post" class="inline">
                                    @csrf
                                    @method('delete')                
                                    <button type="submit"> 
                                    Delete Artist
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