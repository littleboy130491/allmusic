@extends('dashboard')
@section('content')

 <!--Container-->
 <div class="container mt-6">
 <a href="/dashboard/category/create">Create New Category</a>
    
      		 
               
               <!--Card-->
                <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
                
                  
                   <table class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Category Name</th>
                               <th>Action</th>
                            </tr>
                       </thead>
                       <tbody>
                       @foreach($categories as $category)
                           <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $category->name }}</td>
                               <td>
                                <a class= "btn btn-blue" href="/dashboard/category/{{ $category->id }}/edit">Edit
                                </a> / 
                                <form action="/dashboard/category/{{ $category->id }}" method="post" class="inline">
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