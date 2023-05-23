<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La mesa de los sabores - Menú</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/StyleMenu.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
                        <a class="nav-link" href="">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="col-lg-9">

            <div class="row" id="menu-grid">


                <?php
                $servername = "localhost";
                $username = "root";
                $password = "jaime0454";
                $dbname = "PROYECTORESTAURANT";

                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    echo "La conexión falló: " . $e->getMessage();
                }

                function getPlatillos()
                {
                    global $conn;
                    $stmt = $conn->prepare("SELECT * FROM PLATILLOS");
                    $stmt->execute();

                    // set the resulting array to associative
                    return $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                ?>
                <?php
                $platillos = getPlatillos();
                foreach ($platillos as $platillo) {
                ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?php echo $platillo['urlimagen']; ?>" class="card-img-top" alt="<?php echo $platillo['nombre']; ?>">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $platillo['nombre']; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo $platillo['descripcion']; ?>
                                </p>
                                <p class="card-text"><strong>Precio: </strong>$
                                    <?php echo $platillo['precio']; ?>
                                </p>
                                <p class="card-text"><strong>Calificación: </strong>
                                    <?php echo $platillo['calificacion']; ?>
                                </p>
                                <button class="btn btn-primary addToCartBtn" data-platillo-id="<?php echo $platillo['id']; ?>">Agregar al carrito</button>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

        </div>
        <div class="col-lg-3">
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel">Offcanvas</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div id="offcanvasCarrito">
                        <!-- Los platillos agregados al carrito se mostrarán aquí -->
                    </div>
                </div>

            </div>
            <button class="btn btn-primary position-fixed bottom-0 end-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                Abrir Offcanvas
            </button>
        </div>

    </div>
    <!-- Incluye tu archivo JS personalizado -->
    <script src="../js/ScriptMenu.js"></script>
</body>

</html>