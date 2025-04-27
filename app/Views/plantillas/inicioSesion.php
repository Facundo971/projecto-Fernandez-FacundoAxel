<main class="conteiner__form-inicioSesion">
    <div class="bg-light rounded-2 pt-3 pb-4">
        <h1 class="text-center mb-3">¿Tenés una Cuenta?</h1>
        <form action="" method="GET"> 
            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="email"><b>Correo Electrónico</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="email" id="email" placeholder="Ingrese su correo..." maxlength="254" pattern=".+@gmail\.com" title="Debe ser un correo válido de Gmail (por ejemplo, usuario@gmail.com)" required class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <label for="password"><b>Contraseña</b></label>      
                </div>
                <div class="col-12 mt-2 d-flex justify-content-center ps-5 pe-5">
                    <input type="password" id="password" placeholder="Ingrese su contraseña..." minlength="8" maxlength="16" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" title="Debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial" required class="w-100 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12 d-flex justify-content-center">
                    <a href="#" class="text-decoration-none text-dark opacity-75">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a href="#" class="text-decoration-none text-dark opacity-75">¿Aún no tenés tu cuenta?</a> 
                </div>
            </div>

            <div class="mt-3 d-flex justify-content-center"> 
                <input type="submit" value="Ingresar" class="text-white w-25 rounded-2 conteiner__form-div-input-ingresar">
            </div>
        </form>
    </div>
</main>