<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<form action="/crear-cuenta" class="formulario" method="POST">

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
            type="text" 
            placeholder="Tu Nombre"
            id="nombre"
            name="nombre"
        />
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
            type="text" 
            placeholder="Tu Apellido"
            id="apellido"
            name="apellido"
        />
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
            type="tel" 
            placeholder="Tu Telefono"
            id="telefono"
            name="telefono"
        />
    </div>

    <div class="campo">
        <label for="email">E-mail</label>
        <input 
            type="email" 
            placeholder="Tu Email"
            id="email"
            name="email"
        />
    </div>

    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
            type="password" 
            placeholder="Tu contraseña"
            id="password"
            name="password"
        />
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">

</form>


<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Olvidaste tu Contraseña?</a>
</div>