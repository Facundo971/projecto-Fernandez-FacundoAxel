<?php 
    $boleano = true;

    foreach ($productos as $producto) {
        if ($producto['eliminado'] == 'NO') {
            $boleano = false;
            break;
        }
    }
?>

<main>
    <div class="bg-light rounded-2 contenedor__div-index">
        <?php if($boleano == true): ?>
            <div class="bg-white pt-5 pb-5">
                <div class="text-center">
                    <img src="<?= base_url('assets/img/Producto no disponible.png'); ?>" alt="Producto no disponible" width="140px">
                </div>
                <h4 class="text-center ps-4 pe-4"><b>No hay productos disponibles en estos momentos</b></h4>
                <p class="text-center opacity-75 ps-4 pe-4">Más tarde se agregarán nuevos productos. ¡Vuelve pronto!</p>
            </div>
        <?php else: ?>
            <div class="contenedor__h1-index">
                <h1><span class="ps-2 pe-2 text-white contenedor__h1-span">Productos en Ofertas</span></h1>
            </div>
            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 g-4 p-2 d-flex justify-content-center">
                <?php foreach($productos as $producto): ?>
                    <?php if($producto['eliminado'] == 'NO' && $producto['precio'] > $producto['precio_vta']): ?>
                        <div class="col">
                            <div class="card h-100 shadow">
                                <img src="<?= base_url('assets/uploads/' . $producto['imagen']); ?>" class="card-img-top p-2" alt="Producto" height="160px">
                                <div class="card-body">
                                    <h5 class="card-title"><b><?php echo $producto['nombre_producto'] ?></b></h5>
                                    <p class="card-text opacity-75 contenedor__div-p-descripcion"><?php echo $producto['descripcion'] ?></p>
                                    <div class="row d-flex align-items-center">
                                        <div class="col d-flex justify-content-end">
                                            <span class="text-decoration-line-through opacity-75">$<?php echo $producto['precio'] ?></span>
                                        </div>
                                        <div class="col d-flex justify-content-start h-25">
                                            <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%<?= round((($producto['precio'] - $producto['precio_vta']) / $producto['precio']) * 100); ?> OFF</b></span>
                                        </div>
                                    </div>
                                    <h4 class="text-center"><b>$<?php echo $producto['precio_vta'] ?></b></h4>
                                    <?php if($producto['stock'] > 0): ?>
                                        <?php if($producto['stock'] >= $producto['stock_min']): ?>
                                            <p class="card-text text-dark opacity-75 mb-0">Disponibles: <?php echo $producto['stock']; ?></p>
                                            <p class="card-text text-dark mb-1"><b>¡Stock disponible!</b></p>
                                        <?php else: ?>
                                            <p class="card-text text-dark opacity-75 mb-0">Disponibles: <?php echo $producto['stock']; ?></p>
                                            <p class="card-text text-dark mb-1"><b>¡Últimos disponibles!</b></p>
                                        <?php endif; ?>
                                    <form action="<?= base_url('enviar-formCarritoAgregar/' . $producto['id']); ?>" method="post">
                                        <?= csrf_field() ?>
                                        <input type="submit" value="Añadir al carrito" class="text-white w-100 rounded-2 conteiner__div-boton-carrito" style="font-weight: bold;">
                                    </form>
                                    <?php else: ?>
                                            <p class="card-text text-dark opacity-75 mb-0">Disponibles: <?php echo $producto['stock']; ?></p>
                                            <p class="card-text text-dark mb-1"><b>Sin stock</b></p>
                                            <span class="text-white text-center p-2 bg-danger rounded-1 d-block" style="height:38px;"><b>No disponible</b></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <!-- <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Notebook Apple 1.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>APPLE</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">Apple MacBook Air (13 pulgadas, 2020, Chip M1, 256 GB de SSD, 8 GB de RAM, Ryzen 9) - Gris espacial</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$1.889.999</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%8 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$1.738.799</b></h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Notebook Apple 2.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>APPLE</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">MacBook Air M2 (2022) 13.6" color silver 8GB de Ram - 256GB SSD - Ryzen 7 - Apple M</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$1.755.434</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%18 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$1.439.455</b></h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Notebook Lenovo 1.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>LENOVO</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">Lenovo Ideapad Slim 3 15,6 Ryzen 5 8gb 512ssd W11 Color Azul</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$2.303.927</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%59 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$943.799</b></h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Notebook Lenovo 2.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>LENOVO</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">V-Series V15 15.6" color iron gray 16GB de Ram 256GB SSD Intel Core i7</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$2.200.500</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%38 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$1.355.399</b></h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Notebook HP 1.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>HP</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">Hp Core I5-1235u 8gb Ssd 256gb Silver 15.6 Us W11</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$1.316.999</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%21 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$1.040.429</b></h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Notebook HP 2.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>HP</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">Hp Amd Ryzen 5 7520u, 8gb Ram DDR5, 512gb Ssd, Pantalla 15.6" Full HD, Windows 11, Color Silver</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$1.099.999</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%50 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$549.999</b></h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Netbook Noblex 1.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>NOBLEX</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">Noblex Pentium Atom N455 4gb Ram 500gb Hdd Windows 7 (Reacondicionado)</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$70.000</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%10 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$63.000</b></h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Netbook Noblex 2.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>NOBLEX</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">G5 Noblex Celeron 1,6ghz 4ram 256ssd 10,1 (Usado)</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$159.999</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%20 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$127.999</b></h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Netbook EXO 1.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>EXO</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">EXO Exomate S433 10" color negro 4GB de Ram - 500GB HDD - Intel Core i5</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$229.999</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%20 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$183.999</b></h4>
                        </div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="text-decoration-none">
                        <div class="card h-100 shadow">
                            <img src="assets/img/Netbook EXO 2.webp" class="card-img-top p-2" alt="Producto" height="160px">
                            <div class="card-body">
                                <h5 class="card-title"><b>EXO</b></h5>
                                <p class="card-text opacity-75 contenedor__div-p-descripcion">Exo Smart Rm244 Intel Celeron N4020 4gb Ssd 128gb 11</p>
                                <div class="row d-flex align-items-center">
                                    <div class="col d-flex justify-content-end">
                                        <span class="text-decoration-line-through opacity-75">$292.999</span>
                                    </div>
                                    <div class="col d-flex justify-content-start h-25">
                                        <span class="text-white ps-1 pe-1 border border-0 rounded-1 contenedor__div-span-oferta"><b>%5 OFF</b></span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="text-center"><b>$278.349</b></h4>
                        </div>
                    </a>
                </div> -->
            </div>
    </div>

    <div class="container text-center mt-5">
        <div class="row row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-1 d-flex justify-content-center">
            <div class="col">
                <div>
                    <img src="<?= base_url('assets/img/envio.svg'); ?>" alt="Envio" width="80px" height="80px" class="contenedor__div-img-1-index">
                </div>
                <div>
                    <h5><b>Envío gratis</b></h5>
                    <p class="ps-5 pe-5 opacity-75">Solo por estar registrado en NetShop tenés envíos gratis de los productos que ofrecemos.</p>
                </div>
            </div>
            <div class="col">
                <div>
                    <img src="<?= base_url('assets/img/seguridad.svg'); ?>" alt="Seguridad" width="80px" height="80px" class="contenedor__div-img-1-index">
                </div>
                <div>
                    <h5><b>Seguridad, de principio a fin</b></h5>
                    <p class="ps-5 pe-5 opacity-75">En NetShop, no hay nada que no puedas hacer, porque estás siempre protegido.</p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</main>