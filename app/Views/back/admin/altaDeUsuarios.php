<?php
    $session = session();
    $valorUsuarioNombre = $session->getFlashdata('usuarioNombreValor');
    $valorUsuarioApellido = $session->getFlashdata('usuarioApellidoValor');
    $valorUsuarioEmail = $session->getFlashdata('usuarioEmailValor');
    $valorUsuarioUsers = $session->getFlashdata('usuarioUsersValor');
    $valorUsuarioContraseña = $session->getFlashdata('usuarioContraseñaValor');
    $valorUsuarioPerfil = $session->getFlashdata('usuarioPerfilValor');
?>

<main class="conteiner__form-altaDePerfiles">
    <div class="bg-light rounded-2 pt-3 pb-4">
        <h1 class="text-center mb-3">Agregar Usuarios</h1>
        <?php if(session()->getFlashdata('msgExitoso')): ?>
            <div class="text-center mt-2">
                <p class="fs-5 text-white"><b class="p-1 bg-success bg-opacity-75 rounded-2"><?= session()->getFlashdata('msgExitoso'); ?></b></p>
            </div>
        <?php endif; ?>

        <?php $validation = \Config\Services::validation() ?>
        <form action="<?php echo base_url('enviar-formUsuario'); ?>" method="POST">
            <?= csrf_field() ?> 
            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="nombre"><b>Nombre</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre..." value="<?= esc($valorUsuarioNombre); ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('nombre')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('nombre'); ?> </b></p>
                    </div> 
                <?php }?>

                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="apellido"><b>Apellido</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="apellido" name="apellido" placeholder="Ingrese el apellido..." value="<?= esc($valorUsuarioApellido); ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('apellido')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('apellido'); ?> </b></p>
                    </div> 
                <?php }?>

                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="email"><b>Correo Electronico</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="email" id="email" name="email" placeholder="Ingrese el correo..." value="<?= esc($valorUsuarioEmail); ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('email')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('email'); ?> </b></p>
                    </div> 
                <?php }?>

                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="usuario"><b>Usuario</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="text" id="usuario" name="usuario" placeholder="Ingrese el nombre de usuario..." value="<?= esc($valorUsuarioUsers); ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('usuario')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('usuario'); ?> </b></p>
                    </div> 
                <?php }?>

                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="contraseña"><b>Contraseña</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese la contraseña..." value="<?= esc($valorUsuarioContraseña); ?>" class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
                <?php if($validation->getError('contraseña')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('contraseña'); ?> </b></p>
                    </div> 
                <?php }?>

                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="perfil"><b>Perfil</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <select name="perfil" id="perfil" class="opacity-75 w-100 p-2 border shadow" style="cursor: pointer;">
                        <option value="">Seleccionar Perfil</option>
                        <?php foreach($perfiles as $perfil): ?>
                            <option value="<?= $perfil['id_perfil']; ?>" 
                                <?= (isset($valorUsuarioPerfil) && $valorUsuarioPerfil == $perfil['id_perfil']) ? 'selected' : ''; ?>>
                                <?= $perfil['descripcion']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if($validation->getError('perfil')) {?> 
                    <div class="text-center mt-2"> 
                        <p class="fs-6 text-danger"><b><?= $error = $validation->getError('perfil'); ?> </b></p>
                    </div> 
                <?php }?>
            </div>

            <div class="mt-3 d-flex justify-content-center"> 
                <input type="submit" value="Agregar" class="text-white w-25 rounded-2 conteiner__form-div-input-agregarCancelar">
                <a href= "<?php echo base_url('limpiarUsuarioUser'); ?>" class="w-25 ms-3 btn btn-danger text-white rounded-2"><b>Borrar</b></a>
            </div>
        </form>
    </div>
</main>