<div class="contacto-bg"></div>

<form class="formulario">

    <div id="mensajeSuccess" class="mensaje success"></div>
    <div id="mensajeError" class="mensaje error"></div>

    <div class="campo">
        <label class="campo__label" for="nombre">Nombre</label>
        <input type="text" id="nombre">
    </div>
    <div class="campo">
        <label class="campo__label" for="email">Correo</label>
        <input type="text" id="email">
    </div>
    <div class="campo">
        <label class="campo__label" for="mensaje">Mensaje</label>
        <textarea id="mensaje" rows="4" cols="40"></textarea>
    </div>

    <div class="campo">
        <input type="submit" value="Enviar" class="btn btn-register">
    </div>

    <div id="loader" class="loader"></div>
</form>