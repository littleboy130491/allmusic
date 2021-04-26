@extends('dashboard')
@section('content')

 <!--Container-->
 <div class="container mt-6">
 <a href="/dashboard/album/create">Create New Album</a>
    
      		 
               
               <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                
                  
                   <table class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Album Title</th>
                               <th>Album Overview</th>
                               <th>Album Released Year</th>
                               <th>Album Image</th>
                               <th>Album Category</th>
                               <th>Artist</th>
                           
                               <th>Action</th>
                            </tr>
                       </thead>
                       <tbody>
                       @foreach($albums as $album)
                           <tr>
                               <td>{{ $loop->index + 1 }}</td>
                               <td>{{ $album->title }}</td>
                               <td>{{ $album->overview }}</td>
                               <td>{{ $album->released_year }}</td>
                               <td>
                                    @if (isset($album->image))
                                    <img src="{{ $album->image }}" width="100px">
                                    @else
                                    <img src="/storage/1024px-No_image_available.svg.png" width="100px">
                                    @endif
                               </td>
                               <th>Album Category</th>
                               <td>{{ @$album->artist->name }}</td>
                    
                               
                               <td>
                                <a href="/dashboard/album/{{ $album->id }}/edit">Edit
                                </a> / 
                                <form action="/dashboard/album/{{ $album->id }}" method="post" class="inline">
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