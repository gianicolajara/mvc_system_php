<main>
    <?php $this->showMessage()?>
    <form action="<?php echo constant('URL'); ?>login/authenticate" method="POST" class="form">
        <div class="form-group">
            <label for="user">Usuario:</label>
            <input type="text" name="user" id="user">
        </div>
        <div class="form-group">
            <label for="pass">Contraseña:</label>
            <input type="password" name="pass" id="pass">
        </div>
        <input type="submit" value="Ingresar" class="btn">
    </form>
</main>