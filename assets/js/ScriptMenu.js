document.addEventListener('DOMContentLoaded', function () {
    const darkModeSwitch = document.getElementById('darkModeSwitch');

    // Escucha el cambio de estado del botón de alternancia
    darkModeSwitch.addEventListener('change', function () {
        document.body.classList.toggle('dark-mode');

        const nav = document.querySelector('nav');
        nav.classList.toggle('bg-dark');
        nav.classList.toggle('navbar-dark');
        nav.classList.toggle('bg-light');
        nav.classList.toggle('navbar-light');

        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.classList.toggle('dark-mode');
        });

        const offcanvas = document.getElementById('offcanvasRight');
        offcanvas.classList.toggle('dark-mode');
    });

});


$(document).ready(function() {
  // Captura el clic del botón "Agregar al carrito"
  $('.addToCartBtn').on('click', function() {
    alert("juan")
    // Obtén el ID del platillo desde el atributo de datos
    var platilloId = $(this).data('platillo-id');
    alert("juan")
    // Realiza una solicitud AJAX para obtener los detalles del platillo desde el servidor
    $.ajax({
        url: '../pages/menu.php', // Nombre del archivo PHP que contiene el código para obtener los detalles del platillo
        method: 'POST', // Puedes cambiar a 'GET' si estás utilizando el método GET en tu archivo PHP
        data: { id: platilloId },
        success: function(response) {
          // Maneja la respuesta del servidor
          var platillo = JSON.parse(response);
          alert("prueba")
          
          // Agrega el platillo al carrito en el offcanvas
          agregarAlCarrito(platillo);
        },
        error: function() {
          console.log('Error al obtener los detalles del platillo.');
        }
      });
    });
  
  // Función para agregar el platillo al carrito en el offcanvas
  function agregarAlCarrito(platillo) {
    var carrito = $('#offcanvasCarrito');
    
    // Construye el elemento HTML para el platillo en el carrito
    var platilloHtml = '<div class="carrito-item">';
    platilloHtml += '<h6>' + platillo.nombre + '</h6>';
    platilloHtml += '<p>Precio: $' + platillo.precio + '</p>';
    platilloHtml += '</div>';
    
    // Agrega el platillo al carrito
    carrito.append(platilloHtml);
  }
});
