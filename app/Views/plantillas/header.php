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
<header class="bg-white">
    <nav class="pt-1">
        <div class="border-bottom d-flex justify-content-around">
            <div class="d-flex justify-content-center">
                <a href="<?php echo base_url('/'); ?>"><img src="assets/img/Logo de la Empresa.jpg" alt="Logo" width="200px" height="80px"></a>
            </div>

            <?php echo $this->include('plantillas/search')?>

            <ul class="nav nav-tabs d-flex justify-content-end align-items-center contenedor__nav">
                <li class="nav-item">
                    <a class="nav-link text-dark opacity-75" href="<?php echo base_url('inicioSesion'); ?>">Inicio de Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link item__li-a-1" href="<?php echo base_url('carrito'); ?>"><img src="assets/img/carro-vacio.png" alt="Carrito" width="20px" class="contenedor__nav-li-a-img-1"></a>
                </li>
            </ul>
        </div>

        <div class="navbar navbar-expand-lg navbar-dark border-bottom">
            <div class="container-fluid d-flex justify-content-center">
                <div>
                    <div class="dropdown d-flex align-items-center contenedor__a-categorias">
                        <a class="btn item__li-a-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/img/hamburger.png" alt="Hamburguesa" width="12px" height="12px" class="me-2 mb-1 contenedor__nav-li-a-img-2">
                            <b>Categorias</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><b>Hogar</b></a></li>
                            <li><a class="dropdown-item" href="#"><b>Trabajo</b></a></li>
                            <li><a class="dropdown-item" href="#"><b>Educación</b></a></li>
                            <li><a class="dropdown-item" href="#"><b>Gaming</b></a></li>
                            <li><a class="dropdown-item" href="#"><b>Diseño y Edición Multimedia</b></a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs d-flex justify-content-end align-items-center contenedor__nav">
                        <li class="nav-item">
                            <a class="nav-link item__li-a-1" href="<?php echo base_url('productos'); ?>"><b>Productos</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link item__li-a-1" href="<?php echo base_url('consultas'); ?>"><b>Consultas</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link item__li-a-1" href="<?php echo base_url('ayuda#contacto'); ?>"><b>Contacto</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link item__li-a-1" href="<?php echo base_url('comercializacion'); ?>"><b>Comercializacion</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link item__li-a-1" href="<?php echo base_url('terminosUsos'); ?>"><b>Términos y Usos</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link item__li-a-1" href="<?php echo base_url('ayuda'); ?>"><b>Ayuda</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>