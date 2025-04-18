<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo;?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="bg-secondary">
    <nav class="pt-1">
        <div class="d-flex justify-content-around">
            <div class="d-flex justify-content-center">
                <a href="#"><img src="assets/img/Logo de la Empresa.jpg" alt="Logo" width="200px" height="80px"></a>
            </div>

            <?php echo $this->include('plantillas/search')?>

            <ul class="nav nav-tabs d-flex justify-content-end align-items-center contenedor__nav">
                <li class="nav-item">
                    <a class="nav-link text-light item__li-a-1" href="#">Inicio de Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light item__li-a-1" href="#"><img src="assets/img/carro-vacio.png" alt="Carrito" width="20px" class="contenedor__nav-li-a-img-2"></a>
                </li>
            </ul>
        </div>

        <div class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid d-flex justify-content-center">
                <div>
                    <div class="dropdown d-flex align-items-center">
                        <a class="btn text-light item__li-a-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/img/hamburger.png" alt="Hamburguesa" width="12px" height="12px" class="me-2 mb-1 contenedor__nav-li-a-img-2">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Hogar</a></li>
                            <li><a class="dropdown-item" href="#">Trabajo</a></li>
                            <li><a class="dropdown-item" href="#">Educación</a></li>
                            <li><a class="dropdown-item" href="#">Gaming</a></li>
                            <li><a class="dropdown-item" href="#">Diseño y Edición Multimedia</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs d-flex justify-content-end align-items-center contenedor__nav">
                        <li class="nav-item">
                            <a class="nav-link text-light item__li-a-1" href="#">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light item__li-a-1" href="#">Consultas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light item__li-a-1" href="#">Ayuda</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>