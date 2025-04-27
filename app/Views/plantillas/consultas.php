<main>
    <div class="bg-light rounded-2 pt-3 pb-4 ms-5 me-5">
        <h1 class="text-center mb-3">Déjanos tu Consulta</h1>
        <form class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-3">
                <div class="d-flex justify-content-center">
                    <label for="name"><b>Nombre Completo</b></label>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="text" id="name" placeholder="Ingrese su nombre..." maxlength="50" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="El nombre solo debe contener letras y espacios" required class="w-75 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-3">
                <div class="d-flex justify-content-center">
                    <label for="surname"><b>Apellido Completo</b></label>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="text" id="surname" placeholder="Ingrese su apellido..." maxlength="50" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="El apellido solo debe contener letras y espacios" required class="w-75 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-3">
                <div class="d-flex justify-content-center">
                    <label for="dni"><b>DNI</b></label>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="number" id="dni" placeholder="Ingrese su dni..." title="El DNI debe contener exactamente 8 dígitos" required class="w-75 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mt-3">
                <div class="d-flex justify-content-center">
                    <label for="phone"><b>Teléfono</b></label>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="number" id="phone" placeholder="Ingrese su numero telefónico..." title="El teléfono debe contener entre 10 y 15 dígitos" required class="w-75 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="d-flex justify-content-center">
                    <label for="email"><b>Correo Electrónico</b></label>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="email" id="email" placeholder="Ingrese su correo..." maxlength="254" pattern=".+@gmail\.com" title="Debe ser un correo válido de Gmail (por ejemplo, usuario@gmail.com)" required class="w-75 ps-2 pe-2 pt-1 pb-1 border shadow">
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="d-flex justify-content-center">
                    <label for="consulta"><b>Consulta</b></label>
                </div>
                <div class="d-flex justify-content-center">
                    <textarea name="consulta" id="consulta" placeholder="Ingrese la consulta que desea realizar..." rows="5" maxlength="600" title="Puedes escribir hasta 600 caracteres" required class="w-75 ps-2 pe-2 pt-1 pb-1 border shadow"></textarea>
                </div>
            </div>
            <div class="mt-3 d-flex justify-content-center">
                <input type="submit" value="Enviar Consulta" class="text-white rounded-2 ps-3 pe-3 conteiner__form-div-input-enviarConsulta">
            </div>
        </form>
    </div>
</main>