document.addEventListener('DOMContentLoaded', function() {
    const darkModeSwitch = document.getElementById('darkModeSwitch');
  
    // Escuchar el cambio de estado del botón de alternancia
    darkModeSwitch.addEventListener('change', function() {
      document.body.classList.toggle('dark-mode');
  
      const nav = document.querySelector('nav');
      nav.classList.toggle('bg-dark');
      nav.classList.toggle('navbar-dark');
      nav.classList.toggle('bg-light');
      nav.classList.toggle('navbar-light');
    });
  });
  