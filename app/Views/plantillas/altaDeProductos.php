<main class="conteiner__form-inicioSesion">
    <div class="bg-light rounded-2 pt-3 pb-4">
        <h1 class="text-center mb-3">Agregar Productos</h1>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php $validation = \Config\Services::validation() ?>
        <form action="<?php echo base_url('enviar-formProducto'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?> 
            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="nombre"><b>Producto</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto..." title="" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('nombre')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('nombre'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="categoria"><b>Categoria</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <select name="categoria" id="categoria">
                        <option value="">Seleccionar Categoria</option>
                        <?php foreach($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['descripcion']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if($validation->getError('categoria')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('categoria'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="precio"><b>Precio</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="number" id="precio" name="precio" placeholder="Ingrese el precio del producto..." title="" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('precio')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('precio'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="precioVta"><b>Precio Venta</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="number" id="precioVta" name="precioVta" placeholder="Ingrese el precio de venta del producto..." title="" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('precioVta')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('precioVta'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="stock"><b>Stock</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="number" id="stock" name="stock" placeholder="Ingrese el stock del producto..." title="" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('stock')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('stock'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="stockMin"><b>Stock Minimo</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="number" id="stockMin" name="stockMin" placeholder="Ingrese el stock minimo del producto..." title="" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('stockMin')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('stockMin'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="imagen"><b>Imagen</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="file" id="imagen" name="imagen" accept="image/png, image/jpg, image/jpeg">
                    <?php if($validation->getError('imagen')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('imagen'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-center"> 
                <input type="submit" value="Agregar" class="text-white me-5 rounded-2 conteiner__form-div-input-ingresar">
                <input type="reset" value="Cancelar" class="text-white ms-5 rounded-2 bg-danger conteiner__form-div-input-ingresar">
            </div>
        </form>
    </div>
</main>