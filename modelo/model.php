<?php

class Comentario {
    private $conexion;
    
    function __construct($host,$user,$pass,$db){
        $this->conexion = new mysqli($host,$user,$pass,$db);
    }


    function getComentarios($pagina){
        $sql = "SELECT * FROM comentario WHERE tipoPagina = ? ORDER BY fecha";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param('s',$pagina);
        $stmt->execute();

        $comentarios = [];
        $resultado = $stmt->get_result();

        while($filas = $resultado->fetch_assoc()){
            array_push($comentarios,$filas);
        }
        
        $stmt->close();

        return $comentarios;
    }

    function insertarComentario($nombre,$comentario,$pagina){
        $sql = "INSERT INTO comentario (nombre,coment,tipoPagina) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param("sss",$nombre,$comentario,$pagina);
        $stmt->execute();

        $stmt->close();
    }

    function cerrarConexion(){
        $this->conexion->close();
    }
}
        

?>