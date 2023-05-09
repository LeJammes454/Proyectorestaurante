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

    // ...
    const signUpForm = document.getElementById('signUpForm');

    signUpForm.addEventListener('submit', function (event) {
        event.preventDefault();

        // Validar que el nombre solo contenga letras
        const name = document.getElementById('signupName').value;
        const nameRegex = /^[a-zA-Z\s]+$/;
        if (!nameRegex.test(name)) {
            alert('El nombre solo puede contener letras y espacios.');
            return;
        }

        // Validar que las contraseñas coincidan
        const password = document.getElementById('signupPassword').value;
        const confirmPassword = document.getElementById('signupConfirmPassword').value;
        if (password !== confirmPassword) {
            alert('Las contraseñas no coinciden.');
            return;
        }

        // Lógica de registro (ej. enviar datos al servidor)
        // Envía los datos del formulario al servidor usando AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'assets/php/register.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (this.status === 200) {
                const response = JSON.parse(this.responseText);

                if (response.status === 'success') {
                    // Limpia el formulario y cierra el modal
                    signUpForm.reset();
                    signUpModal.hide();

                    // Muestra un mensaje de éxito
                    alert(response.message);
                } else {
                    // Muestra un mensaje de error
                    alert(response.message);
                }
            } else {
                alert('Error al enviar los datos del formulario.');
            }
        };

        const data = `name=${encodeURIComponent(document.getElementById('signupName').value)}&address=${encodeURIComponent(document.getElementById('signupAddress').value)}&email=${encodeURIComponent(document.getElementById('signupEmail').value)}&phone=${encodeURIComponent(document.getElementById('signupPhone').value)}&password=${encodeURIComponent(document.getElementById('signupPassword').value)}`;

        xhr.send(data);
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


