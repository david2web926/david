<section>
    <div id="cajaComentarios">
    <?php
        foreach($comentarios as $key => $value){
            echo "<div class='logComentarios'>";
            echo $value['nombre'].'<br>';
            echo $value['coment'].'<br>';
            echo "</div>";
        }
    ?>
    </div>

</section>