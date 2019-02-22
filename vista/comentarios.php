<?php

if(!empty($_GET['ctl'])){
    $tipoPagina = $_GET['ctl'];
}

?>

<section class="comentario">

    <form action="controlador/procesar_comentario.php?ctl=<?=$tipoPagina?>" method="POST">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="tex" class="form-control" name="name" id="name">
        </div>

        <div class="form-group">
            <label for="commit">Comentario:</label>
            <textarea class="form-control" id="commit" name="commit" rows="3"></textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="Publicar">
        <br>
        <br>
    </form>

</section>

<?php
    require_once('controlador/ver_comentarios.php');
?>