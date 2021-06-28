    <footer class="p-8 bg-gradient-to-r from-green-800 to-blue-900">

      <div class="text-white">
      © 2021 MUSIK INDONESIA | All Rights Reserved

      </div>

    </footer>
    @livewireScripts
    <script>
    
        const toggleMenu = document.getElementById('toggle-menu');
        const mobileNav = document.getElementById('mobile-nav');

        toggleMenu.addEventListener('click', () => 
        {
         mobileNav.classList.toggle('block');
         mobileNav.classList.toggle('md:hidden');
         mobileNav.classList.toggle('hidden');
        });
    </script>
  </body>
</html>

