// smooth-scroll.js
document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todos los enlaces que empiezan con '#'
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault(); // Previene el comportamiento predeterminado del enlace

            const targetId = this.getAttribute('href').substring(1); // Obtiene el ID del elemento al que se quiere desplazar
            const targetElement = document.getElementById(targetId); // Obtiene el elemento objetivo

            if (targetElement) {
                const offset = 100; // Ajuste opcional para el desplazamiento
                const targetPosition = targetElement.offsetTop - offset; // Calcula la posición a la que se debe desplazar

                // Realiza el desplazamiento suave
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
});
