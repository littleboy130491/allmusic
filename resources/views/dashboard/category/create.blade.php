@extends('dashboard')
@section('content')
<form class="w-full max-w-lg" action="/dashboard/category" method="post">
@csrf
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Category Name
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text" name="name">
     
    </div>
  </div>




  <div class="md:flex md:items-center">
    <div class="md:w-1/3">
      <button type="submit" class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded" type="button">
        Create
      </button>
    </div>
    <div class="md:w-2/3"></div>
  </div>
</form>
@endsection