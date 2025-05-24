<main class="conteiner__form-inicioSesion">
    <div class="bg-light rounded-2 pt-3 pb-4">
        <h1 class="text-center mb-3">Agregar Categorias</h1>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php $validation = \Config\Services::validation() ?>
        <form action="<?php echo base_url('enviar-formCategoria'); ?>" method="POST">
            <?= csrf_field() ?> 
            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="categoria"><b>Descripcion de la Categoria</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="categoria" name="categoria" placeholder="Ingrese el nombre de la categoria..." title="" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('categoria')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('categoria'); ?> 
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