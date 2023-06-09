<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La mesa de los sabores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/StyleInicio.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">La mesa de los sabores</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- switch para activar el modo oscuro -->
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="darkModeSwitch">
                <label class="form-check-label" for="darkModeSwitch">Modo oscuro</label>
            </div>
            

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="assets/pages/menu.php">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- Dentro de la etiqueta <nav> y después de la etiqueta <div class="collapse navbar-collapse" id="navbarNav"> -->
            <div class="d-flex">
                <button class="btn btn-outline-primary me-2" type="button" id="loginBtn">Iniciar sesión</button>
                <button class="btn btn-primary" type="button" id="signUpBtn">Registrarse</button>
            </div>

        </div>
    </nav>

    <!-- Modal de inicio de secion -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="loginForm" action="assets/php/login.php" method="POST">
                        <div class="mb-3">
                            <label for="loginEmail" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="loginEmail" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="loginPassword" name="contrasena" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de registro -->
    <div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="signUpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signUpModalLabel">Registrarse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="signUpForm" action="assets/php/register.php" method="POST">
                        <div class="mb-3">
                            <label for="signupName" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="signupName" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="signupAddress" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="signupAddress" name="direccion" required>
                        </div>
                        <div class="mb-3">
                            <label for="signupPhone" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="signupPhone" name="telefono" pattern="[0-9]{10}" required>
                        </div>
                        <div class="mb-3">
                            <label for="signupEmail" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="signupEmail" name="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="signupPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="signupPassword" name="contrasena" required>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar" id="passwordStrengthBar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <button type="button" class="btn btn-outline-secondary mb-3" id="togglePasswordVisibility">Ver contraseña</button>

                        <div class="mb-3">
                            <label for="signupConfirmPassword" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="signupConfirmPassword" name="confirmar_contrasena" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Carrusel de imágenes -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg?auto=compress&cs=tinysrgb&w=1600" class="d-block w-100" alt="Comida 1">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1586942/pexels-photo-1586942.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" class="d-block w-100" alt="Comida 2">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Comida 3">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/1633525/pexels-photo-1633525.jpeg?auto=compress&cs=tinysrgb&w=1600" class="d-block w-100" alt="Comida 3">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/718742/pexels-photo-718742.jpeg?auto=compress&cs=tinysrgb&w=1600" class="d-block w-100" alt="Comida 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        </button>
        <button class=" carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <h1>Bienvenido a La mesa de los sabores</h1>
        <p>¡Bienvenido a La Mesa de los Sabores, el lugar donde la comida se convierte en una experiencia única para tus
            sentidos!

            Estamos encantados de recibirte en nuestro restaurante, donde encontrarás una amplia variedad de platos
            preparados con los ingredientes más frescos y sabrosos. Nuestro objetivo es brindarte una experiencia
            culinaria que te haga sentir como en casa y al mismo tiempo te sorprenda con nuevos sabores y texturas.

            Nuestro equipo de chefs altamente calificados se esmera en crear platos únicos que te hagan salivar de solo
            pensar en ellos. Desde deliciosas entradas hasta platos principales llenos de sabor y postres que te dejarán
            boquiabierto, en La Mesa de los Sabores encontrarás algo que satisfará cualquier paladar.

            Además de nuestra deliciosa comida, ofrecemos un ambiente acogedor y elegante para que disfrutes de una
            experiencia completa. Ya sea que estés buscando una cena romántica, una reunión familiar o una cena de
            negocios, nuestro restaurante es el lugar perfecto para una noche inolvidable.

            Así que, si estás buscando un lugar para disfrutar de una comida excepcional en un ambiente único, no
            busques más allá de La Mesa de los Sabores. ¡Esperamos verte pronto y deleitarte con nuestros platos
            exquisitos</p>
    </div>

    <script src="assets/js/scriptsHome.js"></script>
</body>

</html>