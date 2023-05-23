document.addEventListener('DOMContentLoaded', function () {
    const darkModeSwitch = document.getElementById('darkModeSwitch');

    // Escuchar el cambio de estado del botón de alternancia
    darkModeSwitch.addEventListener('change', function () {
        document.body.classList.toggle('dark-mode');

        const nav = document.querySelector('nav');
        nav.classList.toggle('bg-dark');
        nav.classList.toggle('navbar-dark');
        nav.classList.toggle('bg-light');
        nav.classList.toggle('navbar-light');
    });



    // logica para el boton de sing up 
    const signUpBtn = document.getElementById('signUpBtn');
    const signUpModal = new bootstrap.Modal(document.getElementById('signUpModal'));

    // Escuchar el clic del botón de registro y abrir el modal
    signUpBtn.addEventListener('click', function () {
        signUpModal.show();
    });

    
    // logica para el boton de login 
    const loginBtn = document.getElementById('loginBtn');
    const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));

    // Escuchar el clic del botón de registro y abrir el modal
    loginBtn.addEventListener('click', function () {
        loginModal.show();
    });


    // ...
    const passwordInput = document.getElementById('signupPassword');
    const passwordStrengthBar = document.getElementById('passwordStrengthBar');
    const togglePasswordVisibilityBtn = document.getElementById('togglePasswordVisibility');

    // Escuchar el evento 'input' en el campo de contraseña y actualizar la barra de seguridad
    passwordInput.addEventListener('input', function () {
        const strength = checkPasswordStrength(passwordInput.value);
        passwordStrengthBar.style.width = (strength * 20) + '%';
        passwordStrengthBar.setAttribute('aria-valuenow', strength * 20);
    });

    // Escuchar el clic en el botón de visualización de contraseña y alternar el tipo de entrada de contraseña
    togglePasswordVisibilityBtn.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePasswordVisibilityBtn.textContent = 'Ocultar contraseña';
        } else {
            passwordInput.type = 'password';
            togglePasswordVisibilityBtn.textContent = 'Ver contraseña';
        }
    });





});


// Función para verificar la seguridad de la contraseña
function checkPasswordStrength(password) {
    let strength = 0;

    // Incrementa la fuerza si la contraseña tiene al menos una letra minúscula, una letra mayúscula, un dígito y un carácter especial
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/\d/.test(password)) strength++;
    if (/[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password)) strength++;

    // Incrementa la fuerza si la contraseña tiene al menos 8 caracteres
    if (password.length >= 8) strength++;

    return strength;
}

$(document).ready(function () {
    // Escucha el evento de envío del formulario
    $('#signUpForm').submit(function (e) {
        e.preventDefault(); // Evita que se envíe el formulario de forma predeterminada

        // Obtén los datos del formulario
        var formData = $(this).serialize();

        // Envía la solicitud AJAX
        $.ajax({
            url: 'assets/php/register.php',
            type: 'POST',
            data: formData,
            success: function (response) {
                // Maneja la respuesta del servidor
                console.log(response); // Puedes imprimir la respuesta en la consola para fines de depuración

                // Realiza cualquier acción adicional según la respuesta recibida
                if (response === 'error_correo_existente') {
                    // Mostrar mensaje de error de correo existente
                    var errorMensaje = $('<div class="alert alert-danger">Ya existe un usuario con el mismo correo</div>');
                    $('#signUpForm').prepend(errorMensaje);

                    // Ocultar el mensaje después de 3 segundos
                    setTimeout(function () {
                        errorMensaje.slideUp('slow', function () {
                            $(this).remove();
                        });
                    }, 3000);
                } else {
                    // Mostrar mensaje de éxito u otra acción según la respuesta recibida
                    var successMensaje = $('<div class="alert alert-success">Datos enviados correctamente</div>');
                    $('#signUpForm').prepend(successMensaje);

                    // Ocultar el mensaje después de 3 segundos
                    setTimeout(function () {
                        successMensaje.slideUp('slow', function () {
                            $(this).remove();
                        });

                        // Cerrar el formulario después de 2 segundos
                        setTimeout(function () {
                            $('#signUpModal').modal('hide');
                        }, 2000);

                    }, 3000);

                    // Limpia los campos del formulario
                    $('#signUpForm')[0].reset();
                }
            },
            error: function (xhr, status, error) {
                // Maneja los errores de la solicitud AJAX
                console.log(error); // Puedes imprimir el error en la consola para fines de depuración

                // Mostrar mensaje de error genérico
                $('#signUpForm').prepend('<div class="alert alert-danger">Error al enviar los datos</div>');
            }
        });
    });

    $('#loginForm').submit(function(e) {
        e.preventDefault(); // Evita que se envíe el formulario de forma predeterminada
    
        // Obtén los datos del formulario
        var formData = $(this).serialize();
    
        // Envía la solicitud AJAX
        $.ajax({
          url: 'assets/php/login.php',
          type: 'POST',
          data: formData,
          success: function(response) {
            // Maneja la respuesta del servidor
            console.log(response); // imprimir la respuesta en la consola para fines de depuración
    
            // Realiza cualquier acción adicional según la respuesta recibida
            if (response === 'success') {
              // El inicio de sesión fue exitoso
              // Agrega la clase de animación al modal y cierra el modal después de la duración de la animación
              $('#loginModal').addClass('fade-out');
              setTimeout(function() {
                $('#loginModal').modal('hide');
              }, 3000);
              
              // Redirecciona a la página de inicio o realiza otra acción después de cerrar el modal
              setTimeout(function() {
                window.location.href = 'assets/pages/menu.php';
              }, 1000);
            } else {
              // El inicio de sesión falló
              // Muestra un mensaje de error
              $('#loginForm').prepend('<div class="alert alert-danger">Inicio de sesión fallido</div>');
            }
          },
          error: function(xhr, status, error) {
            // Maneja los errores de la solicitud AJAX
            console.log(error); // imprimir el error en la consola para fines de depuración
    
            // Muestra un mensaje de error genérico
            $('#loginForm').prepend('<div class="alert alert-danger">Error al iniciar sesión</div>');
          }
        });
      });


});

