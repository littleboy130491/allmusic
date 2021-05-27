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
          if (mobileNav.style.display === "none") {
          mobileNav.style.display = "block";
          } else {
          mobileNav.style.display = "none";
          }
        });
    </script>
  </body>
</html>