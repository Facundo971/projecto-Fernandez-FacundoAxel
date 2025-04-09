<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php echo $this->include('plantillas/header')?>

    <main>
        <div class="d-flex justify-content-end">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ordenar por
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Mayor Precio</a></li>
                    <li><a class="dropdown-item" href="#">Menor Precio</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <p>Filtros</p>
            </div>
            <div class="col-10 card">
                <a href="#" class="text-decoration-none pt-2 pb-2 border-bottom">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="assets/img/OIP.jpg" class="img-fluid rounded-start" width="60%" height="50%" alt="Producto">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-dark"><b>Nombre del Producto</b></h5>
                                <p class="card-text text-dark">Descripcion del producto a verder</p>
                                <span class="text-decoration-line-through text-decoration-none text-dark">$100.000</span>
                                <span class="bg-success text-light ps-1 pe-1">%50 OFF</span>
                                <h4 class="text-dark"><b>$50.000</b></h4>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="text-decoration-none pt-2 pb-2 border-bottom">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="assets/img/OIP.jpg" class="img-fluid rounded-start" width="60%" height="50%" alt="Producto">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-dark"><b>Nombre del Producto</b></h5>
                                <p class="card-text text-dark">Descripcion del producto a verder</p>
                                <h4 class="text-dark"><b>$50.000</b></h4>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="#" class="text-decoration-none pt-2 pb-2 border-bottom">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="assets/img/OIP.jpg" class="img-fluid rounded-start" width="60%" height="50%" alt="Producto">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-dark"><b>Nombre del Producto</b></h5>
                                <p class="card-text text-dark">Descripcion del producto a verder</p>
                                <h4 class="text-dark"><b>$50.000</b></h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </main>

    <!-- <style> -->
        
    <!-- </style> -->

    <?php echo $this->include('plantillas/footer')?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>