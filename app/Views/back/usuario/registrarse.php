<main class="conteiner__form-inicioSesion">
    <div class="bg-light rounded-2 pt-3 pb-4">
        <h1 class="text-center mb-3">Registrarse</h1>

        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php $validation = \Config\Services::validation() ?>
        <form action="<?php echo base_url('/enviar-form'); ?>" method="POST">
            <?= csrf_field() ?>
            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="nombre"><b>Nombre</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre..." class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('nombre')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('nombre'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="apellido"><b>Apellido</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido..." class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('apellido')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('apellido'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="usuario"><b>Usuario</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="usuario" name="usuario" placeholder="Ingrese su usuario..." class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('usuario')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('usuario'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="email"><b>Correo Electrónico</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="email" id="email" name="email" placeholder="Ingrese su correo..." title="Debe ser un correo válido de Gmail (por ejemplo, usuario123@gmail.com)" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('email')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('email'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="contraseña"><b>Contraseña</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña..." class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if($validation->getError('contraseña')) {?> 
                        <div class="alert alert-danger mt-2"> 
                            <?= $error = $validation->getError('contraseña'); ?> 
                        </div> 
                    <?php }?>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-center"> 
                <input type="submit" value="Registrarse" class="text-white w-25 rounded-2 conteiner__form-div-input-ingresar">
            </div>
        </form>
    </div>
</main>