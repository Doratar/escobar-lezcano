<?php include('app/Views/header.php'); ?>

<!-- Consigna -->
<p>La página con información de contacto, donde se publicará el nombre del titular
    de la empresa, la razón social, el domicilio legal, teléfonos, y otros medios de
    contacto que se consideren necesario. Deberá facilitar un cuestionario para que
    el potencial cliente se comunique con miembros de la empresa.</p>


<div class="row">
    <div class="col-md-6">
        <img src="assets/img/logo.png" alt="Logo Kicks UP" class="img-fluid" style="max-height: 150px;">
        <h2>Kicks Up</h2>
        <h4>CUIT: 30-20987623-2</h4>
        <h4>Domicilio: 9 de Julio 1449, W3400 AZB Corrientes</h4>
        <h4>Telefono: 03794473930</h4>
    </div>

    <div class="col-md-6">
        <h2>Ubicación</h2>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d372.10574199961945!2d-58.83229999637175!3d-27.46657042477034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456ca6d24ec0c9%3A0xb92ce3fedb0d7729!2sFacultad%20de%20Ciencias%20Exactas%20y%20Naturales%20y%20Agrimensura!5e0!3m2!1ses-419!2sar!4v1744057093953!5m2!1ses-419!2sar"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>


<div>
    <!-- Formulario de consultas -->
    <form>

        <!-- Input de mail -->
        <h1>Formulario para consultas</h1>
        <div class="mb-3">
            <label for="basic-url" class="form-label">Ingrese su mail</label>
            <div class="input-group">
                <input type="mail" class="form-control" id="mailinput" aria-describedby="basic-addon3 basic-addon4">
            </div>
            <div class="form-text" id="basic-addon4">Ejemplo: fulano@dominio.com</div>
        </div>

        <!-- Input de telefono -->

        <div class="mb-3">
            <label for="basic-url" class="form-label">Ingrese su número de telefono:</label>
            <div class="input-group">
                <input id="telefonoinput" type="text" class="form-control" placeholder="369-1234567"
                    aria-label="telefono" aria-describedby="input-telefono" pattern="^\d{10}$" required>
                <div class="invalid-feedback">
                    Por favor ingrese un numero de telefono válido
                </div>
            </div>
            <div class="form-text" id="basic-addon4">Ejemplo: fulano@dominio.com</div>
        </div>

        <div class="mb-3">
            <label for="consultainput">Ingrese su consulta</label>
            <div class="input-group">
                <span class="input-group-text">Consulta</span>
                <textarea id="consultainput" class="form-control" aria-label="With textarea"></textarea>
            </div>
        </div>


        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Enviar consulta</button>
        </div>
    </form>
</div>

</body>

</html>