@extends('dashboard')
@section('content')

 <!--Container-->
 <div class="container mt-6">
        @if (session('status'))
        <div class="container bg-blue-600 text-white rounded p-4 mb-6">
        {{ session('status')}}
        </div>     	
        @endif	
        <a class="shadow bg-green-600 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="/dashboard/artist/create">Create New Artist</a>
    
      		 
               
               <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-6 rounded shadow bg-white">
                
                  
                   <table class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Artist Name</th>
                               <th>Artist Photo</th>
                               <th>Album</th>
                           
                               <th>Action</th>
                            </tr>
                       </thead>
                       <tbody>
                       @foreach($artists as $artist)
                           <tr class="h-12">
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $artist->name }}</td>
                               <td>
                                    @if (isset ($artist->photo))
                                        <img src="{{ $artist->photo }}" width="100px">
                                        @else
                                        <img src="/storage/1024px-No_image_available.svg.png" width="100px">
                                    @endif
                               </td>
                               <td>
                                    @foreach ($artist->albums as $album)
                                            {{ $album->title }}
                                    @endforeach
                               </td>
                    
                               
                               <td>
                                <a class="shadow bg-green-600 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="/dashboard/artist/{{ $artist->id }}/edit">Edit
                                </a>
                                <form action="/dashboard/artist/{{ $artist->id }}" method="post" class="inline">
                                    @csrf
                                    @method('delete')                
                                    <button class="shadow bg-red-600 hover:bg-red-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mx-2" type="submit"> 
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