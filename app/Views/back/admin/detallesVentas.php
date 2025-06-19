<main class="conteiner__listaDeVentaDetalleCompraRealizada">
    <div class="bg-white rounded-2">
        <h1 class="text-center pt-2">Detalle de la Compra</h1>
        <div class="text-end pb-2 pe-2">
            <button id="btnImprimir" class="p-2 border-0 rounded-2"><b class="text-white bg-opacity-75">Imprimir Detalle</b></button>
        </div>
        <div class="listaDeVentaDetalleCompraRealizada-scroll mt-2">
            <div class="row w-100 ms-0 border-top">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 pb-3 pt-3 border-end d-flex justify-content-center align-items-center">
                    <p class="mb-0"><b>Producto</b></p>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 pb-3 pt-3 border-end d-flex justify-content-center align-items-center">
                    <p class="mb-0"><b>Descripción</b></p>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 pb-3 pt-3 border-end d-flex justify-content-center align-items-center">
                    <p class="mb-0"><b>Cantidad</b></p>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 pb-3 pt-3 border-end d-flex justify-content-center align-items-center">
                    <p class="mb-0"><b>Precio</b></p>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 pb-3 pt-3 text-center border-end">
                    <p class="mb-0"><b>Subtotal</b></p>
                </div>
            </div>
            <?php 
                $acumulado = 0;
            ?>        
            <?php foreach($detalles as $detalle): ?>
                <?php 
                    $productoEncontrado = null;
                    foreach($productos as $producto){
                        if($producto['id'] == $detalle['producto_id']){
                            $productoEncontrado = $producto;
                            break;
                        }
                    }
                    $subtotal = $detalle['cantidad'] * $productoEncontrado['precio_vta'];
                    $acumulado += $subtotal;
                ?>
                <div class="row w-100 ms-0 border-top">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 pb-3 pt-3 border-end d-flex justify-content-center">
                        <p class="mb-0"><?= isset($productoEncontrado) ? esc($productoEncontrado['nombre_producto']) : 'Producto no encontrado' ?></p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 pb-3 pt-3 border-end d-flex justify-content-center align-items-center">
                        <p class="mb-0"><?= isset($productoEncontrado) ? esc($productoEncontrado['descripcion']) : '' ?></p>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 pb-3 pt-3 border-end d-flex justify-content-center">
                        <p class="mb-0"><?= esc($detalle['cantidad']) ?></p>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 pb-3 pt-3 border-end d-flex justify-content-center">
                        <p class="mb-0">$<?= number_format($productoEncontrado['precio_vta'], 2) ?></p>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 pb-3 pt-3 text-center border-end">
                        <p class="mb-0">$<?= number_format($subtotal, 2) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="row w-100 ms-0 border-top">
                <div class="col-10 pb-3 pt-3 border-end d-flex justify-content-end align-items-center">
                    <p class="mb-0"><strong>Total</strong></p>
                </div>
                <div class="col-2 pb-3 pt-3 d-flex justify-content-center align-items-center">
                    <p class="mb-0"><strong>$<?= number_format($acumulado, 2) ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Imprimir -->
<script>
    function imprimirDetalle() {
        var contenido = document.querySelector(".contenedor__tablaDetallesCompraRealizada").innerHTML;
        var ventana = window.open('', '', 'height=800,width=800');
        ventana.document.write(`
            <html>
                <head>
                    <title>Imprimir Detalle</title>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                    <style>
                        body { margin: 20px; }
                        .contenedor__tablaDetallesCompraRealizada .row {
                            margin: 0;
                            display: flex;
                        }
                        .contenedor__tablaDetallesCompraRealizada .row > div {
                            border: 1px solid #ddd !important;
                            padding: 12px;
                        }
                    </style>
                </head>
                <body>
                    <h1 class="text-center mb-3 pt-2">Detalle de la Compra</h1>
                    ${contenido}
                </body>
            </html>
        `);
        ventana.document.close();
        ventana.focus();

        ventana.onload = function() {
            ventana.print();
            ventana.close();
        };
    }

    document.addEventListener("DOMContentLoaded", function(){
        document.getElementById("btnImprimir").addEventListener("click", imprimirDetalle);
    });
</script>