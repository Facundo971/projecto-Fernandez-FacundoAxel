<header class="bg-secondary">
    <nav>
        <div class="d-flex justify-content-between">
            <div class="bg-danger contenedor__img">
                <a href="#"><img src="assets/img/OIP.jpg" alt="Gato" width="70px" height="100%"></a>
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
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs d-flex justify-content-end align-items-center contenedor__nav">
                        <li class="nav-item">
                            <a class="nav-link text-light item__li-a-1" href="#">Produstos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light item__li-a-1" href="#">Contactos</a>
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

<style>
    .contenedor__img{
        margin-left: 100px;
    }

    .contenedor__nav{
        height: 70px;

        border: none;
    }

    .item__li-a-1:hover{
        border: 1px solid blue !important;
    }
    .item__li-a-1:focus{
        border: 1px solid blue !important;
    }

    .contenedor__nav-li-a-img-2{
        filter: invert(88%) sepia(100%) saturate(1%) hue-rotate(77deg) brightness(105%) contrast(101%);
    }
</style>
