<main class="conteiner__form-altaDeProductos">
    <div class="bg-light rounded-2 pt-3 pb-4">
        <h1 class="text-center mb-3">Editar Producto</h1>

        <?php $validation = \Config\Services::validation() ?>
        <form action="<?php echo base_url('enviar-formProductoActualizar'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?> 
            <div class="row mt-3">
                <!-- Campo oculto para el id -->
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="hidden" name="id" readonly value="<?= $producto['id']; ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>

                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="nombre"><b>Producto</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto..." value="<?= session()->getFlashdata('limpiarProductoValor') ? '' : $producto['nombre_producto'] ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('nombre')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('nombre'); ?> </b></p>
                    </div> 
                <?php }?>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="descripcion"><b>Descripción</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="descripcion" name="descripcion" placeholder="Ingrese la descripción del producto..." value="<?= session()->getFlashdata('limpiarProductoValor') ? '' : $producto['descripcion'] ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('descripcion')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('descripcion'); ?> </b></p>
                    </div>
                <?php }?>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="categoria"><b>Categoria</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <select name="categoria" id="categoria" class="opacity-75 w-100 p-2 border shadow" style="cursor: pointer;">
                        <option value="" <?= session()->getFlashdata('limpiarProductoValor') ? 'selected' : '' ?>>Seleccionar Categoria</option>
                        <?php foreach($categorias as $categoria): ?>
                            <option value="<?= $categoria['id']; ?>" 
                                <?= (!session()->getFlashdata('limpiarProductoValor') && $categoria['id'] == $producto['categoria_id'] ? 'selected' : '') ?>>
                                <?= $categoria['descripcion']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if($validation->getError('categoria')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('categoria'); ?> </b></p>
                    </div>
                <?php }?>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="marca"><b>Marca</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <select name="marca" id="marca" class="opacity-75 w-100 p-2 border shadow" style="cursor: pointer;">
                        <option value="">Seleccionar Marca</option>
                        <?php foreach($marcas as $marca): ?>
                            <option value="<?= $marca['id_marca']; ?>" 
                                <?= (!session()->getFlashdata('limpiarProductoValor') && $marca['id_marca'] == $producto['marca_id'] ? 'selected' : '') ?>>
                                <?= $marca['descripcion']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if($validation->getError('marca')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('marca'); ?> </b></p>
                    </div>
                <?php }?>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="precio"><b>Precio</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="number" id="precio" name="precio" placeholder="Ingrese el precio del producto..." value="<?= session()->getFlashdata('limpiarProductoValor') ? '' : $producto['precio'] ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('precio')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('precio'); ?> </b></p>
                    </div>
                <?php }?>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="precioVta"><b>Precio Venta</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="number" id="precioVta" name="precioVta" placeholder="Ingrese el precio de venta del producto..." value="<?= session()->getFlashdata('limpiarProductoValor') ? '' : $producto['precio_vta'] ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('precioVta')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('precioVta'); ?> </b></p>
                    </div>
                <?php }?>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="stock"><b>Stock</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="number" id="stock" name="stock" placeholder="Ingrese el stock del producto..." value="<?= session()->getFlashdata('limpiarProductoValor') ? '' : $producto['stock'] ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('stock')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('stock'); ?> </b></p>
                    </div>
                <?php }?>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="stockMin"><b>Stock Mínimo</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="number" id="stockMin" name="stockMin" placeholder="Ingrese el stock mínimo del producto..." value="<?= session()->getFlashdata('limpiarProductoValor') ? '' : $producto['stock_min'] ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('stockMin')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('stockMin'); ?> </b></p>
                    </div>
                <?php }?>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="imagen"><b>Imagen</b></label>      
                </div>
                <div class="col-12 mt-2">
                    <p class="ps-5 pe-5">El tamaño del archivo no debe superar los 8 MB</p>
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <img src="<?= base_url('assets/uploads/' . $producto['imagen']); ?>" alt="Imagen actual" style="max-width:200px;">
                </div>
                <div class="col-12 ps-5 pe-5">
                    <input type="file" id="imagen" name="imagen" accept="image/png, image/jpg, image/jpeg" class="opacity-75 w-100">
                </div>
                <?php if($validation->getError('imagen')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('imagen'); ?> </b></p>
                    </div>
                <?php }?>
            </div>

            <div class="mt-3 d-flex justify-content-center"> 
                <input type="submit" value="Editar" class="text-white w-25 me-5 rounded-2 conteiner__form-div-input-agregarCancelar">
                <a href= "<?php echo base_url('limpiarProductoAct/' . $producto['id']); ?>" class="w-25 ms-3 btn btn-danger text-white rounded-2"><b>Borrar</b></a>
            </div>
        </form>
    </div>
</main>