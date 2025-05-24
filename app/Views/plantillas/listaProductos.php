<main class="conteiner__quienesSomos">
    <div class="bg-light rounded-2 ms-5 me-5">
        <div>
            <h1 class="text-center mb-3 pt-2">Lista de Productos</h1>
        </div>
        <div class="border-bottom border-top pt-3">
            <?php foreach($productos as $producto): ?>
                <b class="ps-2">Nombre: <?php echo $producto['nombre_producto']; ?></b>
                <p class="ps-4 pe-2 opacity-75">Precio: <?php echo $producto['precio']; ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</main>