<!-- <div class="d-flex justify-content-center align-items-center bg-black"> -->
    <!-- <div class="btn-group h-50 bg-danger">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categoria
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Menu item</a></li>
            <li><a class="dropdown-item" href="#">Menu item</a></li>
            <li><a class="dropdown-item" href="#">Menu item</a></li>
        </ul>
    </div> -->
    <form class="d-flex justify-content-center w-50">
        <div class="form__div-1">
            <input type="search" name="name" placeholder="Escribe el producto que quieres buscar..." class="form__div-1-input">
        </div>
        <div class="form__div-2">
            <button class="form__div-2-button">
                <img src="assets/img/lupa.png" alt="Lupa" height="20px">
            </button>
        </div>
    </form>
<!-- </div> -->

<style>
    .form__div-1{
        width: 100%;
        height: 70px;

        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form__div-1-input{
        height: 36px;
        width: 100%;

        padding-left: 10px;

        border: none;
        border-radius: 2px;
        outline: none;
    }

    .form__div-2{
        height: 70px;

        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form__div-2-button{
        background-color: white;

        height: 36px;

        border: none;
        border-radius: 2px;
        border-left: 1px solid #A9A9A9;

        position: relative;
        right: 2px;
    }
</style>