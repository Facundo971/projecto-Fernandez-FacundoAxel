<?php 
    $boleano = true;

    foreach ($categorias as $categoria) {
        if ($categoria['activo'] == 1) {
            $boleano = false;
            break;
        }
    }
?>

<main class="conteiner__listaDeCategorias">
    <div class="bg-white rounded-2">
        <h1 class="text-center pt-2">Lista de Categorias</h1>
        <div class="d-flex justify-content-end pb-2 pe-2">
            <a href= "<?php echo base_url('mostrarListaCategoriasDesactivados'); ?>" class="btn btn-danger text-white rounded-2"><b>Desactivos</b></a>
        </div>
        <div>
            <div class="row w-100 ms-0 border-top">
                <div class="col-4 pb-3 pt-3 border-end d-flex justify-content-center align-items-center">
                    <p class="mb-0"><b>ID</b></p>
                </div>
                <div class="col-8 pb-3 pt-3 border-end d-flex justify-content-center align-items-center">
                    <p class="mb-0"><b>Categorias</b></p>
                </div>
            </div>
            <?php if($boleano == true): ?>
                <div class="bg-white pt-5 pb-5 border-top">
                    <div class="text-center">
                        <img src="<?= base_url('assets/img/Categoria no agregada.png'); ?>" alt="Categoria no agregada" width="140px">
                    </div>
                    <h4 class="text-center ps-4 pe-4"><b>Ups, parece que no hay categorias registradas</b></h4>
                </div>
            <?php else: ?>
                <?php foreach($categorias as $categoria): ?>
                    <?php if($categoria['activo'] == 1): ?>
                        <div class="row w-100 ms-0 border-top">
                            <div class="col-4 pb-3 pt-3 border-end d-flex justify-content-center align-items-center">
                                <p class="mb-0"><?php echo $categoria['id']; ?></p>
                            </div>
                            <div class="col-8 pb-3 pt-3 border-end d-flex justify-content-center align-items-center">
                                <p class="mb-0"><?php echo $categoria['descripcion']; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</main>