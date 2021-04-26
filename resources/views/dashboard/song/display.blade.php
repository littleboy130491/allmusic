@extends('dashboard')
@section('content')

 <!--Container-->
 <div class="container mt-6">
 <a href="/dashboard/song/create">Create New Song</a>
    
      		 
               
               <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                
                  
                   <table class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Song Title</th>
                               <th>Song Overview</th>
                               <th>Song Released Year</th>
                               <th>Artist</th>
                               <th>Action</th>
                            </tr>
                       </thead>
                       <tbody>
                       @foreach($songs as $song)
                           <tr>
                               <td>{{ $loop->index + 1 }}</td>
                               <td>{{ $song->title }}</td>
                               <td>{{ $song->overview }}</td>
                               <td>{{ $song->released_year }}</td>
                               <td>
                                    <a href="/dashboard/artist/{{ @$song->artist->id }}/edit">
                                        {{ @$song->artist->name }}
                                    </a>
                                    </td>
                               <td>
                                <a class= "btn btn-blue" href="/dashboard/song/{{ $song->id }}/edit">Edit
                                </a> / 
                                <form action="/dashboard/song/{{ $song->id }}" method="post" class="inline">
                                    @csrf
                                    @method('delete')                
                                    <button type="submit"> 
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