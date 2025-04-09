<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php echo $this->include('plantillas/header')?>

    <main class="d-flex justify-content-center">
        <div class="row bg-light w-75 pt-5 pb-5">
            <div class="col-12 d-flex justify-content-center align-items-end">
                <p class="fs-5">No hay productos en su carrito</p>
            </div>
            <div class="col-12 h-25 d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-primary">Ir a Comprar</button>
            </div>
        </div>

    </main>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main{
            background-color: #D3D3D3;

            padding-top: 40px;
            padding-left: 120px;
            padding-right: 120px;
            padding-bottom: 40px;

            flex: 1;
        }
    </style>

    <?php echo $this->include('plantillas/footer')?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>