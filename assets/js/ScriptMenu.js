// Añade esto en el archivo scripts.js
function agregarCarrito() {
    // Implementa la funcionalidad para agregar platillos al carrito.
    // Por ejemplo, añadir elementos a la lista desplegable.
}

function marcarFavorito() {
    // Implementa la funcionalidad para marcar un platillo como favorito.
}

document.getElementById("darkModeSwitch").addEventListener("change", function () {
    document.body.classList.toggle("dark-mode");
    document.querySelector(".navbar").classList.toggle("dark-mode");
    const cards = document.querySelectorAll(".card");
    for (const card of cards) {
        card.classList.toggle("dark-mode");
    }
});
