<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php echo $this->include('plantillas/header')?>

    <main>
        <div class="row bg-light pt-5 pb-5">
            <div class="col-8 d-flex justify-content-center">
                <img src="assets/img/OIP.jpg" alt="Producto" width="40%">
            </div>
            <div class="col-3 border">
                <h1 class="fs-4 text-primary pt-2">Nombre del Producto</h1>
                <p class="fs-5 text-black">Descripcion del producto a verder</p>
                <p>Vendido por <span class="text-primary">'Nombre de la Empresa'</span></p>

                <span class="fs-5 text-decoration-line-through pe-3">$100.000</span>
                <span class="fs-5 bg-success text-light ps-1 pe-1 container__div-span-2">%50 OFF</span>
                <p class="fs-3"><b>$50.000</b></p>

                <button type="button" class="btn btn-primary w-100 mb-2">Ir a Comprar</button>
                <button type="button" class="btn btn-success w-100 mb-3">Agregar al Carrito</button>
            </div>
        </div>
        <div class="row bg-light pb-3 border-top">
            <div class="col-12">
                <h2>Productos relacionados</h2>
            </div>
            <div class="row d-flex justify-content-evenly">
                <div class="col-2 text-center border border-dark">
                    <div class="pt-3">
                        <a href="#"><img src="assets/img/OIP.jpg" alt="Producto1" width="100%"></a>
                    </div>
                    <div>
                        <a href="#" class="fs-5 pt-1 text-decoration-none text-black">Descripcion del producto a verder</a>
                    </div>
                </div>
                <div class="col-2 text-center border border-dark">
                    <div class="pt-3">
                        <a href="#"><img src="assets/img/OIP.jpg" alt="Producto1" width="100%"></a>
                    </div>
                    <div>
                        <a href="#" class="fs-5 pt-1 text-decoration-none text-black">Descripcion del producto a verder</a>
                    </div>
                </div>
                <div class="col-2 text-center border border-dark">
                    <div class="pt-3">
                        <a href="#"><img src="assets/img/OIP.jpg" alt="Producto1" width="100%"></a>
                    </div>
                    <div>
                        <a href="#" class="fs-5 pt-1 text-decoration-none text-black">Descripcion del producto a verder</a>
                    </div>
                </div>
                <div class="col-2 text-center border border-dark">
                    <div class="pt-3">
                        <a href="#"><img src="assets/img/OIP.jpg" alt="Producto1" width="100%"></a>
                    </div>
                    <div>
                        <a href="#" class="fs-5 pt-1 text-decoration-none text-black">Descripcion del producto a verder</a>
                    </div>
                </div>
                <div class="col-2 text-center border border-dark">
                    <div class="pt-3">
                        <a href="#"><img src="assets/img/OIP.jpg" alt="Producto1" width="100%"></a>
                    </div>
                    <div>
                        <a href="#" class="fs-5 pt-1 text-decoration-none text-black">Descripcion del producto a verder</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row bg-light pb-3 border-top">
            <div class="col-12">
                <h2>Caracteristicas</h2>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-3 border">
                    <p>Primera Caracteristica 1</p>
                </div>
                <div class="col-8 border">
                    <p>Descripcion de la caracteristica</p>
                </div>
                <div class="col-3 border">
                    <p>Primera Caracteristica 2</p>
                </div>
                <div class="col-8 border">
                    <p>Descripcion de la caracteristica</p>
                </div>
                <div class="col-3 border">
                    <p>Primera Caracteristica 3</p>
                </div>
                <div class="col-8 border">
                    <p>Descripcion de la caracteristica</p>
                </div>
                <div class="col-3 border">
                    <p>Primera Caracteristica 4</p>
                </div>
                <div class="col-8 border">
                    <p>Descripcion de la caracteristica</p>
                </div>
                <div class="col-3 border">
                    <p>Primera Caracteristica 5</p>
                </div>
                <div class="col-8 border">
                    <p>Descripcion de la caracteristica</p>
                </div>
            </div>
        </div>
    </main>

    <?php echo $this->include('plantillas/footer')?>

    <style>
        main{
            background-color: #D3D3D3;

            padding-top: 40px;
            padding-left: 120px;
            padding-right: 120px;
            padding-bottom: 40px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>