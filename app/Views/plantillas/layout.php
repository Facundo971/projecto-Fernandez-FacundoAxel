<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php echo $this->include('plantillas/header')?>
    <?php echo $this->include('plantillas/carrusel')?>

    <?php echo $this->renderSection('contenido') ?>

    <?php echo $this->include('plantillas/footer')?>
</body>
</html>