<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>
    @yield('title') 
    </title>

  @livewireStyles
  
  </head>

  <body class="">
    <header class="shadow bg-gray-200">
      <nav class="container flex justify-between p-8 items-center">
        
          <div class="space-x-4 w-1/2">
            <a id="logo" href="/" class="mr-4 font-bold">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
              </svg>
              MUSIK INDONESIA
            </a>
          </div>

          <div id="desktop-nav" class="hidden md:flex w-full justify-between items-center">
            <div class="space-x-8">
            <a href="/artists">ARTIST</a>
            <a href="/songs">SONG</a>
            <a href="/albums">ALBUM</a>
            <a href="/about">ABOUT</a>
            </div>
        
            
            <div class="relative">
              <livewire:search />
            </div>
          </div>

          <div id="toggle-menu" class="block md:hidden cursor-pointer">
          Menu
          </div>

       
        
      </nav>  
      <nav id="mobile-nav" class="hidden border-t-2">
          <div class="flex-col space-y-4 p-6">
          <a class="block" href="/artists">ARTIST</a>
          <a class="block" href="/songs">SONG</a>
          <a class="block" href="/albums">ALBUM</a>
          <a class="block" href="/about">ABOUT</a>
          <div class="relative w-full">
              <livewire:search />
            </div>
          </div>
      </nav>  
    </header>

    
