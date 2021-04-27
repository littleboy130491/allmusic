@extends('dashboard')
@section('content')

 <!--Container-->
 <div class="container mt-6">
    @if (session('status'))
        <div class="container bg-blue-600 text-white rounded p-4 mb-6">
        {{ session('status')}}
        </div>     	
    @endif	
    <a class="shadow bg-green-600 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="/dashboard/album/create">Create New Album</a>
    
 
               
               <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-6 rounded shadow bg-white">
                
                  
                   <table class="stripe hover text-left" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
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
                           <tr class="h-12">
                               <td>{{ $loop->iteration }}</td>
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
                               <td>
                                @foreach ($album->categories as $category)
                                {{ $category->name }}
                                @endforeach
                               </td>
                               <td>{{ @$album->artist->name }}</td>
                    
                               
                               <td>
                                <a class="shadow bg-green-600 hover:bg-green-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="/dashboard/album/{{ $album->id }}/edit">Edit
                                </a>
                                <form action="/dashboard/album/{{ $album->id }}" method="post" class="inline">
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