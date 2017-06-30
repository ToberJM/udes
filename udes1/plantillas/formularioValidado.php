<div class="form-group">
    <br>
    <input type="text" class="form-control"  name="nombre" placeholder="Nombre de usuario" <?php $validar->mostrarNombre() ?>>    
    <?php
    $validar -> mostrarErrorNom();
    ?>
</div>
<div class="form-group">
    <input type="email" class="form-control" placeholder="email" name="email" <?php $validar->mostrarEmail() ?>>
    <?php
    $validar -> mostrarErrorEmail();
    ?>
</div>
<div class="form-group">                        
    <input type="password" class="form-control" name="clave1" placeholder="Escribe tu contraseña" >  
    <?php
    $validar -> mostrarErrorClave1();
    ?>
</div>
<div class="form-group">
    <input type="password" class="form-control" name="clave2" placeholder="Repite la contraseña">  
    <?php
    $validar -> mostrarErrorClave2();
    ?>
</div>
<div class="form-group">
    <input type="date" class="form-control" id="fecha_nac"  name="fechan" <?php $validar->mostrarFechan() ?>>
</div>
<div class="form-group">
    <label class="radio-inline"><input type="radio" name="sexo">Masculino</label>
    <label class="radio-inline"><input type="radio" name="sexo" checked>Femenino</label>                           
</div>
<button type="submit" id="btRegistro" class="btn btn-default" name="enviar">Crear cuenta</button>
<br>
<br>
<a href="#ventana1" data-toggle="modal"> ¿Ya tienes una cuenta? </a>
<br>
<br>
<a href="#"> ¿Olvidaste tu contraseña? </a>

