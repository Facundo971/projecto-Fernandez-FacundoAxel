<main class="conteiner__form-inicioSesion">
    <div class="bg-light rounded-2 pt-3 pb-4">
        <h1 class="text-center mb-3">¿Tenés una Cuenta?</h1>
        <?php if(session()->getFlashdata('msgWelcome')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('msgWelcome'); ?>
            </div>
        <?php endif; ?>

        <?php $validation = \Config\Services::validation() ?>
        <form action="<?php echo base_url('/enviar-login'); ?>" method="POST">
            <?= csrf_field() ?> 
            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="email"><b>Correo Electrónico</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="email" id="email" name="email" placeholder="Ingrese su correo..." maxlength="254" pattern=".+@gmail\.com" title="Debe ser un correo válido de Gmail (por ejemplo, usuario@gmail.com)" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if(session()->getFlashdata('msgEmail')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= session()->getFlashdata('msgEmail'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="contraseña"><b>Contraseña</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña..." class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                    <?php if(session()->getFlashdata('msgPassword')): ?>
                        <div class="alert alert-danger mt-2">
                            <?= session()->getFlashdata('msgPassword'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center">
                    <a href="#" class="text-decoration-none text-dark opacity-75">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a href="<?php echo base_url('registrarse'); ?>" class="text-decoration-none text-dark opacity-75">¿Aún no tenés tu cuenta?</a> 
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-center"> 
                <input type="submit" value="Ingresar" class="text-white w-25 rounded-2 conteiner__form-div-input-ingresar">
            </div>
        </form>
    </div>
</main>